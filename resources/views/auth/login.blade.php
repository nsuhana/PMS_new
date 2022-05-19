@extends('base2')

@section('content')

<div style="height: 500px;">
    <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="card shadow">
            <div class="d-flex"  style="height: auto;">
                <div class="card-body my-bg-primary d-none d-md-block" style="width: 200px;"></div>
                <div class="card-body m-3">
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                    <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="form-group mt-2">
                                    <label for="email" class="form-label"><small>{{__('Email')}}</small></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required autofocus>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="password" class="form-label"><small>{{__('Password')}}</small></label>
                                    <input type="password" class="form-control" name="password" id="password" required autocomplete="current-password">
                                </div>
                                <div class="form-group mt-2">
                                    <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">
                                      {{__('Remember me')}}
                                    </label>
                                </div>
                                <div class="d-flex m-2 flex-column flex-md-row justify-content-between align-items-center">
                                    {{-- <div class="flex items-center justify-end mt-4"> --}}
                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 my-text-primary" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                        @endif
                        
                                        <button class="btn my-btn-primary mx-md-3 mx-0 my-2 my-md-0">
                                            {{__('Log Masuk')}}
                                        </button>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- 
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                go back
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}