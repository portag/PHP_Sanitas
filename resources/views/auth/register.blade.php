<x-guest-layout>
    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>



        <!-- DNI -->
        <div>
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                required autofocus autocomplete="dni" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- tarjeta -->
        <div>
            <x-input-label for="tarjetasanitaria" :value="__('N. Tarjeta Sanitaria')" />
            <x-text-input id="tarjetasanitaria" class="block mt-1 w-full" type="text" name="tarjetasanitaria"
                :value="old('tarjetasanitaria')" required autofocus autocomplete="tarjetasanitaria" />
            <x-input-error :messages="$errors->get('tarjetasanitaria')" class="mt-2" />
        </div>


        <!-- nacimiento -->
        <div>
            <x-input-label for="fnacimiento" :value="__('Nacimiento')" />
            <x-text-input id="fnacimiento" class="block mt-1 w-full" type="date" name="fnacimiento"
                :value="old('fnacimiento')" required autofocus autocomplete="fnacimiento" />
            <x-input-error :messages="$errors->get('fnacimiento')" class="mt-2" />
        </div>


        <!-- imagen

        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <input id="imagen" type="file" name="imagen" class="block mt-1 w-full">
        </div>
 -->
        <div>
            <x-input-label for="imagen" />
            <input id="imagen" type="hidden" name="imagen" value="/storage/default_profile_pic.png">
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar conrtaseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

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
