{{-- x-(component name) --}}
<x-layout>
    <x-slot name="header">
        Create Job
    </x-slot>

    <form method="POST" action="/jobs">
        @csrf


        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Add Job Details</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Shift Leader"
                                required aria-required="true" />
                            <x-form-error name='title' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="salary" name="salary" id="salary" placeholder="50000" required
                                aria-required="true" />
                            <x-form-error name='salary' />
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
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button type="submit">Save</x-form-button>
        </div>
    </form>

</x-layout>
