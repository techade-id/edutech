<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{route('admin.categories.create')}}" class="font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-6 lg:px-8">
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
                @forelse ($categories as $cat)

                <div class="item-card grid grid-cols-2 md:grid-cols-3 items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($cat->icon) }}" alt="" class="rounded-full object-cover w-16">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-sm md:text-lg font-bold">{{ $cat->name }}</h3>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col mx-auto">
                        <p class="text-slate-500 text-sm">Date</p>
                        <h3 class="text-indigo-950 font-bold">{{ $cat->created_at->format('d M Y') }}</h3>
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-1 text-center ml-auto">
                        <a href="{{ route('admin.categories.edit', $cat) }}" class="font-bold text-sm md:text-base py-2 px-4 inline-block w-full bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold text-sm md:text-base py-2 px-4 bg-red-700 hover:bg-red-600 text-white rounded-full" onclick="return confirm('Yakin mau hapus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
                @empty

                <p class="text-center">Belum ada kategori</p>
                <a href="{{route('admin.categories.create')}}" class="w-fit mx-auto font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                    Add New
                </a>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>