<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <select required name="email" id="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option disabled selected>Choose...</option>
                            @foreach ($user as $u)
                            <option value="{{ $u->email }}">{{ $u->email }} ({{ $u->name }})</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center mt-4">

                        <button type="submit" class="font-bold py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                            Add New Teacher
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>