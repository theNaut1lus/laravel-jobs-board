<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <x-nav-link link="/">Home</x-nav-link>
        <x-nav-link link="/about">About</x-nav-link>
        <x-nav-link link="/contact">Contact</x-nav-link>
        {{-- named slots need to be passed as a property for the x tag --}}
    </nav>

    {{-- blade creates a <$php $> tag to enter into php mode --}}
    {{ $slot }}
</body>

</html>
