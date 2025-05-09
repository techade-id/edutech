<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Teachers') }}
            </h2>
            <a href="{{ route('admin.teachers.create') }}" class="font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>
    <div>

    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($teachers as $teacher)

                <div class="item-card flex md:grid md:grid-cols-3 items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($teacher->user->avatar) }}" alt="" class="rounded-full object-cover w-16 h-16">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 md:text-lg font-bold">{{ $teacher->user->name }}</h3>
                            <h3 class="text-slate-500 text-xs md:text-sm">{{ $teacher->user->occupation }}</h3>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col mx-auto">
                        <p class="text-slate-500 text-sm">Date</p>
                        <h3 class="text-indigo-950 font-bold">{{ ($teacher->user->created_at->format('d M Y')) }}</h3>
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-2 text-center ml-auto">
                        <form action="{{ route('admin.teachers.destroy', $teacher)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold text-sm md:text-base py-2 px-4 bg-red-700 hover:bg-red-600 text-white rounded-full" onclick="return confirm('Yakin mau hapus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-center">Belum ada guru tersedia</p>
                <a href="{{route('admin.teachers.create')}}" class="w-fit mx-auto font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                    Add New
                </a>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>