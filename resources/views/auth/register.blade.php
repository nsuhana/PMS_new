@extends('base2')

@section('content')

<div style="height: 500px;">
    <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="card shadow">
            <div class="d-flex" style="height: auto;">
                <div class="card-body m-3">
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                    <div class="container">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="form-group mt-2">
                                    <label for="name" class="form-label"><small>Username</small></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required autofocus>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="email" class="form-label"><small>Email</small></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required autofocus>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="password" class="form-label"><small>{{__('Password')}}</small></label>
                                    <input type="password" class="form-control" name="password" id="password" required autocomplete="current-password">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="password_confirmation" class="form-label"><small>{{__('Confirm Password')}}</small></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <div class="d-flex m-2 flex-column flex-md-row justify-content-between align-items-center">
                                    {{-- <div class="flex items-center justify-end mt-4"> --}}
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 my-text-primary" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>
                        
                                        <button class="btn my-btn-primary mx-md-3 mx-0 my-2 my-md-0">
                                            {{__('Buat Akaun')}}
                                        </button>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body my-bg-primary d-none d-md-block" style="width: 200px;"></div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                go back                
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
