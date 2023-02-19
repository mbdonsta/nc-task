@extends('layouts.blank')

@section('title')
    {{ __('Create task') }}
@stop

@section('content')
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                    {{ __('Create task') }}
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="rounded-md">
                    <div class="mb-3">
                        <label for="title" class="sr-only">{{ __('Title') }}</label>
                        <input
                            id="title"
                            name="title"
                            type="text"
                            class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                            value="{{ old('title') }}"
                            placeholder="{{ __('Title') }}">
                        @error('title')
                        <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="sr-only">{{ __('Comment') }}</label>
                        <textarea
                            id="comment"
                            name="comment"
                            class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                            placeholder="{{ __('Comment') }}">{{ old('comment') }}</textarea>
                        @error('comment')
                        <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="sr-only">{{ __('Date') }}</label>
                        <input
                            id="date"
                            name="date"
                            type="text"
                            class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                            value="{{ old('date') }}"
                            placeholder="{{ __('Date') }}">
                        <small>{{ __('Date must be in Y-m-d format.') }}</small>
                        @error('date')
                        <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="minutes" class="sr-only">{{ __('Minutes spent') }}</label>
                        <input
                            id="minutes"
                            name="minutes_spent"
                            type="number"
                            class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                            value="{{ old('minutes_spent') }}"
                            placeholder="{{ __('Minutes spent') }}">
                        @error('minutes_spent')
                        <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-white">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
