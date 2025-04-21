{{-- x-(component name) --}}
<x-layout>
    <x-slot name="header">
        Jobs Page
    </x-slot>
    <h1>{{ $greeting }} from Jobs page, {{ $name }}.</h1>

    <div>
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="hover:underline block px-4 py-6 border border-gray-200">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>
                        {{ $job['title'] }}</strong>: Pays ${{ $job['salary'] }}AUD per year.
                    </strong>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
