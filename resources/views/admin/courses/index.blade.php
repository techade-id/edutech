<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Courses') }}
            </h2>
            <a href="{{ route('admin.courses.create') }}" class="font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-6 lg:px-8">

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


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5 overflow-x-auto">

                @forelse ($courses as $course)
                <div class="item-card flex flex-col md:flex-row gap-y-4 mb-5 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-5">
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="" class="rounded-xl object-cover w-36 sm:w-52 md:w-28">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-lg font-bold">{{ $course->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $course->category->name }}</p>
                            <div class="md:hidden flex flex-row items-center gap-x-1 mt-2">
                                <a href="{{ route('admin.courses.show', $course) }}" class="font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 text-white rounded-full">
                                    Manage
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold text-sm md:text-base py-2 px-4 bg-red-700 text-white rounded-full" onclick="return confirm('Yakin mau hapus?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Students</p>
                        <h3 class="text-indigo-950 font-bold">{{ $course->students->count() }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Videos</p>
                        <h3 class="text-indigo-950 font-bold">{{ $course->course_videos->count() }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Teacher</p>
                        <h3 class="text-indigo-950 font-bold">{{ $course->teacher->user->name }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col lg:flex-row items-center gap-x-1 gap-y-1">
                        <a href="{{ route('admin.courses.show', $course) }}" class="font-bold text-sm w-[90px] text-center lg:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                            Manage
                        </a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold w-[90px] text-sm lg:text-base py-2 px-4 bg-red-700 hover:bg-red-600 text-white rounded-full" onclick="return confirm('Yakin mau hapus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <hr>

                @empty
                <p class="text-center">Belum ada course tersedia</p>
                <a href="{{route('admin.courses.create')}}" class="w-fit mx-auto font-bold text-sm lg:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                    Add New
                </a>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>