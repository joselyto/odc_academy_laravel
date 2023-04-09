<x-app-layout>
    <x-slot name="title">{{ $category->name }}</x-slot>
 
    <h1>{{ $category->name }}</h1>
    <p class="text-end"><i>{{ $category->created_at }}</i></p>
    <p>{{ $category->description }}</p>
    
</x-app-layout>
    
