@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="flex flex-col overflow-x-hidden">
            <form class="mt-8 space-y-6" method="POST" enctype="multipart/form-data" action="{{ route('movie.store') }}">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="title" class="sr-only">{{ __('Title') }}</label>
                        <div class="flex gap-x-2">
                            <input id="title" type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="title" value="{{ old('title') }}" required autocomplete="title" autofocus
                            placeholder="Title">
                        </div>
                    </div>
                    <div>
                        <label for="poster" class="sr-only">{{ __('Poster') }}</label>
                        <div class="flex gap-x-2">
                            <input id="poster" type="file" accept=".jpg,.jpeg,.webm,.png"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="poster" value="{{ old('poster') }}" required autocomplete="poster" autofocus
                            placeholder="Poster">
                        </div>
                    </div>
                    <div>
                        <label for="genre" class="sr-only">{{ __('genre') }}</label>
                        <div class="flex gap-x-2">
                            <select id="genre" multiple
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="genre[]" value="{{ old('url') }}" required autocomplete="genre" autofocus
                            placeholder="genre">
                            @foreach ($genre as $g)
                                <option value="{{$g->id}}">{{$g->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="url" class="sr-only">{{ __('URL') }}</label>
                        <div class="flex gap-x-2">
                            <input id="url" type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="url" value="{{ old('url') }}" required autocomplete="url" autofocus
                            placeholder="Url">
                        </div>
                    </div>
                    <div>
                        <label for="rated" class="sr-only">{{ __('Rated') }}</label>
                        <div class="flex gap-x-2">
                            <input id="rated" type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="rated" value="{{ old('rated') }}" required autocomplete="rated" autofocus
                            placeholder="Rated">
                        </div>
                    </div>
                    <div>
                        <label for="popular" class="sr-only">{{ __('Popular') }}</label>
                        <div class="flex gap-x-2">
                            <input id="popular" type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="popular" value="{{ old('popular') }}" required autocomplete="popular" autofocus
                            placeholder="Popular">
                        </div>
                    </div>
                    <div>
                        <label for="release" class="sr-only">{{ __('Release date') }}</label>
                        <div class="flex gap-x-2">
                            <input id="release" type="date"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="release" value="{{ old('url') }}" required autocomplete="release" autofocus
                            placeholder="Release date">
                        </div>
                    </div>
                    <div>
                        <label for="age" class="sr-only">{{ __('Age Restrict') }}</label>
                        <div class="flex gap-x-2">
                            <input id="age" type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="age" value="{{ old('url') }}" required autocomplete="age" autofocus
                            placeholder="Age Restrict">
                        </div>
                    </div>
                    <div>
                        <label for="description" class="sr-only">{{ __('description') }}</label>
                        <div class="flex gap-x-2">
                            <textarea id="description" type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none rounded-b-md focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            name="description" value="{{ old('description') }}" required autocomplete="description" autofocus">
                            </textarea>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="mt-4 group relative w-32 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection