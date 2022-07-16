<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admins.register.store') }}">
        @csrf

        <!-- First Name -->
            <div>
                <x-label for="first_name" value="first name"/>

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                         :value="old('first_name')"
                         autofocus required/>
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="last_name" value="last name"/>

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                         autofocus required/>
            </div>

            <!-- telephone -->
            <div class="mt-4">
                <x-label for="telephone" value="telephone"/>

                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')"
                         autofocus required/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         autocomplete="new-password" required/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <!-- avatar -->
            <div class="mt-4">
                <x-label for="avatar" value="avatar"/>

                <x-input id="avatar" class="block mt-1 w-full"
                         type="file"
                         name="avatar" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admins.dashboard') }}">
                    back to dashboard
                </a>

                <x-button class="ml-4 bg-blue-500">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
