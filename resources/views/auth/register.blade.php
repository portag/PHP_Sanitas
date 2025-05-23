<x-guest-layout>
    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- DNI -->
        <div class="mt-4">
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                required autocomplete="dni" pattern="^[0-9]{8}[A-Za-z]$"
                title="Debe contener 8 números seguidos de una letra. Ejemplo: 12345678A" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- Tarjeta Sanitaria -->
        <div class="mt-4">
            <x-input-label for="tarjetasanitaria" :value="__('N. Tarjeta Sanitaria')" />
            <x-text-input id="tarjetasanitaria" class="block mt-1 w-full" type="text" name="tarjetasanitaria"
                :value="old('tarjetasanitaria')" required autocomplete="tarjetasanitaria" />
            <x-input-error :messages="$errors->get('tarjetasanitaria')" class="mt-2" />
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mt-4">
            <x-input-label for="fnacimiento" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fnacimiento" class="block mt-1 w-full" type="date" name="fnacimiento"
                :value="old('fnacimiento')" required autocomplete="bdate" />
            <x-input-error :messages="$errors->get('fnacimiento')" class="mt-2" />
        </div>

        <!-- Imagen (oculta por defecto pero también requerida como valor predeterminado) -->
        <div class="mt-4">
            <x-input-label for="imagen" />
            <input id="imagen" type="hidden" name="imagen" value="/storage/default_profile_pic.png" required>
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
