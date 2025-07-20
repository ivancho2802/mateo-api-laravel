<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Qrs
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="GET" action="{{ route('qr') }}">
            @csrf
            <!-- {{ __('Title') }} -->
            <input type="text" name="url" required maxlength="255" placeholder="url o contenido del qr" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('title') }}" />
            <x-input-error :messages="$errors->store->get('url') ?? ''" class="mt-2" />
            <!-- {{ __('Original Url') }} -->
            <!-- {{ __('Save') }} -->
            <x-primary-button class="mt-4">Guardar</x-primary-button>
        </form>
 
    </div>
</x-app-layout>