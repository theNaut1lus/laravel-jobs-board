{{-- x-(component name) --}}
<x-layout>
    <x-slot name="header">
        Jobs Page
    </x-slot>
    <h1>{{ $greeting }} from Jobs page, {{ $name }}.</h1>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}">
                    <strong>
                        {{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year
                    </strong>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
