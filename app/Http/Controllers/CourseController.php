<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dapat tampil di teacher dan owner
        $user = Auth::user();
        $query = Course::with(['category', 'teacher', 'students'])->orderByDesc('id');

        // buat kondisi jika teacher yang login, tampilkan data course untuk teacher tersebut saja
        if ($user->hasRole('teacher')) {
            $query->whereHas('teacher', function ($query) use ($user) {
                $query->where('user_id',  $user->id);
            });
        }

        $courses = $query->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();

        if (!$teacher) {
            return redirect()->route('admin.courses.index')->with('error', 'Unauthorized or invalid teacher');
        }

        DB::transaction(function () use ($request, $teacher) {
            $validated = $request->validated();

            // Proses upload foto
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $validated['teacher_id'] = $teacher->id;

            $course = Course::create($validated);

            if (!empty($validated['course_keypoints'])) {
                foreach ($validated['course_keypoints'] as $keypoint) {
                    $course->course_keypoints()->create([
                        'name' => $keypoint
                    ]);
                }
            }
        });

        return redirect()->route('admin.courses.index')->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        DB::transaction(function () use ($request, $course) {
            $validated = $request->validated();

            // Proses upload foto
            if ($request->hasFile('thumbnail')) {
                // Jika ganti foto, hapus yang lama
                if ($course->thumbnail) {
                    Storage::disk('public')->delete($course->thumbnail);
                }
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $course->update($validated);

            if (!empty($validated['course_keypoints'])) {
                $course->course_keypoints()->delete();
                foreach ($validated['course_keypoints'] as $keypoint) {
                    $course->course_keypoints()->create([
                        'name' => $keypoint
                    ]);
                }
            }
        });

        return redirect()->route('admin.courses.show', $course)->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        DB::beginTransaction();

        try {
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $course->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menghapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
