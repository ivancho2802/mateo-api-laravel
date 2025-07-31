@extends('layouts.user_type.guest')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-2 bg-white light:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

            <form method="POST" action="/session">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 mt-5">
                    <input placeholder="Enter email" type="text" name="email" id="loginName" class="form-control" />
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input placeholder="Enter password" type="text" name="password" id="loginPassword" class="form-control" />
                </div>
                <input type="hidden" name="to" id="to" value="view" />
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar sesion</button>
            </form>
        </div>

    </div>
</div>