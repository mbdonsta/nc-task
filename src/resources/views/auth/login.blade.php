@extends('layouts.blank')

@section('title')
    {{ __('Login') }}
@stop

@section('content')
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                    {{ __('Sign in to your account') }}
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('auth.login.post') }}" method="POST">
                @csrf
                <div class="-space-y-px rounded-md">
                    <div class="mb-3">
                        <label for="email-address" class="sr-only">{{ __('Email address') }}</label>
                        <input
                            id="email-address"
                            name="email"
                            type="email"
                            class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                            value="{{ old('email') }}"
                            placeholder="{{ __('Email address') }}">
                        @error('email')
                        <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                            placeholder="{{ __('Password') }}">
                        @error('password')
                        <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-white">
                        {{ __('Sign in') }}
                    </button>
                </div>
            </form>
            <div>
                {{ __('Not registered?') }} <a class="underline" href="{{ route('auth.register') }}">{{ __('Create an account') }}</a>
            </div>
        </div>
    </div>
@stop
