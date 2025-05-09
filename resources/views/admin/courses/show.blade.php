<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Courses Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <!-- Session success -->
            @if (session()->has('success'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-200 " role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif

            <!-- Session Error -->
            @if (session()->has('error'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-200 " role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif
        </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                <!-- Course Name -->
                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-5">
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[160px] sm:w-[180px]">
                        <div class="flex flex-col gap-y-3">
                            <div class="">
                                <h3 class="text-indigo-950 sm:text-xl font-bold">{{ $course->name }}</h3>
                                <p class="text-slate-500 text-xs sm:text-sm">{{ $course->category->name }}</p>
                            </div>
                            <div class="flex flex-row items-center gap-x-3 sm:hidden">
                                <a href="{{ route('admin.courses.edit', $course) }}" class="font-bold text-sm lg:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                                    Edit Course
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Students</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $course->students->count() }}</h3>
                    </div>
                    <div class="hidden sm:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.courses.edit', $course) }}" class="font-bold py-2 px-4 text-sm lg:text-base bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                            Edit Course
                        </a>
                    </div>
                </div>

                <hr class="my-5">

                <!-- Course videos -->
                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-col">
                        <h3 class="text-indigo-950 text-xl font-bold">Course Videos</h3>
                        <p class="text-slate-500 text-sm">{{ $course->course_videos->count() }} Total Videos</p>
                    </div>
                    <a href="{{ route('admin.course.add_video', $course->id) }}" class="font-bold text-sm lg:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                        Add New Video
                    </a>
                </div>

                <!-- List video -->
                @forelse ($course->course_videos as $video)
                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <iframe width="560" class="rounded-2xl object-cover w-[180px] h-[140px] md:w-[280px] md:h-[200px] lg:w-[200px] lg:h-[130px]" height="315" src="https://www.youtube.com/embed/{{ $video->path_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <div class="flex flex-col gap-y-2">
                            <div class="">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $video->name }}</h3>
                                <p class="text-slate-500 text-sm">Video {{ $loop->iteration }}</p>
                            </div>
                            <div class="flex flex-row items-center gap-x-1 md:hidden">
                                <a href="{{ route('admin.course-videos.edit', $video) }}" class="font-bold text-sm lg:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                                    Edit
                                </a>
                                <form action="{{ route('admin.course-videos.destroy', $video) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold text-sm lg:text-base py-2 px-4 bg-red-700 text-white rounded-full" onclick="return confirm('Yakin mau hapus?')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.0697 5.23C19.4597 5.07 17.8497 4.95 16.2297 4.86V4.85L16.0097 3.55C15.8597 2.63 15.6397 1.25 13.2997 1.25H10.6797C8.34967 1.25 8.12967 2.57 7.96967 3.54L7.75967 4.82C6.82967 4.88 5.89967 4.94 4.96967 5.03L2.92967 5.23C2.50967 5.27 2.20967 5.64 2.24967 6.05C2.28967 6.46 2.64967 6.76 3.06967 6.72L5.10967 6.52C10.3497 6 15.6297 6.2 20.9297 6.73C20.9597 6.73 20.9797 6.73 21.0097 6.73C21.3897 6.73 21.7197 6.44 21.7597 6.05C21.7897 5.64 21.4897 5.27 21.0697 5.23Z" fill="white" />
                                            <path d="M19.2297 8.14C18.9897 7.89 18.6597 7.75 18.3197 7.75H5.67975C5.33975 7.75 4.99975 7.89 4.76975 8.14C4.53975 8.39 4.40975 8.73 4.42975 9.08L5.04975 19.34C5.15975 20.86 5.29975 22.76 8.78975 22.76H15.2097C18.6997 22.76 18.8397 20.87 18.9497 19.34L19.5697 9.09C19.5897 8.73 19.4597 8.39 19.2297 8.14ZM13.6597 17.75H10.3297C9.91975 17.75 9.57975 17.41 9.57975 17C9.57975 16.59 9.91975 16.25 10.3297 16.25H13.6597C14.0697 16.25 14.4097 16.59 14.4097 17C14.4097 17.41 14.0697 17.75 13.6597 17.75ZM14.4997 13.75H9.49975C9.08975 13.75 8.74975 13.41 8.74975 13C8.74975 12.59 9.08975 12.25 9.49975 12.25H14.4997C14.9097 12.25 15.2497 12.59 15.2497 13C15.2497 13.41 14.9097 13.75 14.4997 13.75Z" fill="white" />
                                        </svg>

                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="hidden md:flex flex-row items-center gap-x-1">
                        <a href="{{ route('admin.course-videos.edit', $video) }}" class="font-bold text-sm lg:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                            Edit Video
                        </a>
                        <form action="{{ route('admin.course-videos.destroy', $video) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold text-sm lg:text-base py-2 px-4 bg-red-700 hover:bg-red-600 text-white rounded-full" onclick="return confirm('Yakin mau hapus?')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.0697 5.23C19.4597 5.07 17.8497 4.95 16.2297 4.86V4.85L16.0097 3.55C15.8597 2.63 15.6397 1.25 13.2997 1.25H10.6797C8.34967 1.25 8.12967 2.57 7.96967 3.54L7.75967 4.82C6.82967 4.88 5.89967 4.94 4.96967 5.03L2.92967 5.23C2.50967 5.27 2.20967 5.64 2.24967 6.05C2.28967 6.46 2.64967 6.76 3.06967 6.72L5.10967 6.52C10.3497 6 15.6297 6.2 20.9297 6.73C20.9597 6.73 20.9797 6.73 21.0097 6.73C21.3897 6.73 21.7197 6.44 21.7597 6.05C21.7897 5.64 21.4897 5.27 21.0697 5.23Z" fill="white" />
                                    <path d="M19.2297 8.14C18.9897 7.89 18.6597 7.75 18.3197 7.75H5.67975C5.33975 7.75 4.99975 7.89 4.76975 8.14C4.53975 8.39 4.40975 8.73 4.42975 9.08L5.04975 19.34C5.15975 20.86 5.29975 22.76 8.78975 22.76H15.2097C18.6997 22.76 18.8397 20.87 18.9497 19.34L19.5697 9.09C19.5897 8.73 19.4597 8.39 19.2297 8.14ZM13.6597 17.75H10.3297C9.91975 17.75 9.57975 17.41 9.57975 17C9.57975 16.59 9.91975 16.25 10.3297 16.25H13.6597C14.0697 16.25 14.4097 16.59 14.4097 17C14.4097 17.41 14.0697 17.75 13.6597 17.75ZM14.4997 13.75H9.49975C9.08975 13.75 8.74975 13.41 8.74975 13C8.74975 12.59 9.08975 12.25 9.49975 12.25H14.4997C14.9097 12.25 15.2497 12.59 15.2497 13C15.2497 13.41 14.9097 13.75 14.4997 13.75Z" fill="white" />
                                </svg>

                            </button>
                        </form>
                    </div>

                </div>
                <hr>

                @empty
                <p class="text-center">Belum ada video</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>