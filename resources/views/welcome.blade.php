<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-common.head>
    <x-slot name="tittle">
        ola k ace
    </x-slot>
</x-common.head>

<body style="background-color: #D5ACAB  ;">

    <x-home.navbar />
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <x-home.home-modals />



</body>
</html>
