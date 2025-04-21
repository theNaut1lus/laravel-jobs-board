{{-- x-(component name) --}}
<x-layout>
    <x-slot name="header">
        Register
    </x-slot>

    <form method="POST" action="/register">
        @csrf


        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Register as a new user</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Add user's details</p>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="first_name" id="first_name" placeholder="John" required
                                aria-required="true" />
                            <x-form-error name='first_name' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="last_name" id="last_name" placeholder="Doe" required
                                aria-required="true" />
                            <x-form-error name='last_name' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" placeholder="Doe" required
                                aria-required="true" />
                            <x-form-error name='email' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" placeholder="***" required
                                aria-required="true" />
                            <x-form-error name='password' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password_confirmation" name="password_confirmation"
                                id="password_confirmation" placeholder="***" required aria-required="true" />
                            <x-form-error name='password_confirmation' />
                        </div>
                    </x-form-field>
                </div>

                {{-- Collective error catch, we are going with specialty @error instead. --}}
                {{-- @if ($errors->any())
                    <div class="mt-10">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 italic">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button type="submit">Register</x-form-button>
        </div>
    </form>

</x-layout>
