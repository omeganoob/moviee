@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="flex flex-col overflow-x-hidden">
            <form class="mt-8 space-y-6" method="POST" action="{{ route('genre.store') }}">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">{{ __('Name') }}</label>
                        <div class="flex gap-x-2">
                            <input id="name" type="text"
                            class="appearance-none rounded-none relative block w-64 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Genre name">
                            <button type="submit"
                            class="group relative w-32 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add
                        </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection