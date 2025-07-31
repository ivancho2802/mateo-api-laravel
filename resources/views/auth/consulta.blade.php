@extends('layouts.user_type.guest')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-2 bg-white light:bg-gray-800 overflow-hidden shadow sm:rounded-lg">


            <x-guest-layout>
                <x-auth-card>
                    <x-slot name="logo">
                        <img src="{{ asset('images/constant_companion.png') }}" alt="Descripción de la imagen">
                    </x-slot>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <a href="/" class="text-primary">Volver</a>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('consulta') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                Consultar reultdos
                            </x-button>
                        </div>
                    </form>
                </x-auth-card>
            </x-guest-layout>

        </div>
    </div>
</div>