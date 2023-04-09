@props(['name', 'profession'])
<h1 class="text-danger">Je me nomme {{ $name }} et je suis {{ $profession }}</h1>

{{ $slot }}

<h2><i>{{ $titre }}</i></h2>