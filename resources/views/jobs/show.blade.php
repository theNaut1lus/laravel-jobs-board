{{-- x-(component name) --}}
<x-layout>
    <x-slot name="header">
        Job
    </x-slot>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>
    @can('edit', $job)
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    @endcan


</x-layout>
