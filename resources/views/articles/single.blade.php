<x-app-layout>
    <x-slot name="title">{{ $article->title }}</x-slot>
    @if($article->pic)
        <img src="{{ Storage::url($article->pic) }}" class="img-fluid" alt="">
    @endif
    <h1>{{ $article->title }}</h1>
    <p class="text-end"><i>{{ $article->created_at }}</i></p>
    <p> Slug : {{ $article->slug }}</p>
    <p> Content : {{ $article->content }}</p>
    
    
</x-app-layout>
    
