{{-- x-(component name) --}}
<x-layout>
    <x-slot name="header">
        Login
    </x-slot>

    <form method="POST" action="/login">
        @csrf


        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Login as a new user</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Add login details</p>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" placeholder="Doe" required
                                aria-required="true" :value="old('email')" />
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
            <x-form-button type="submit">Login</x-form-button>
        </div>
    </form>

</x-layout>
