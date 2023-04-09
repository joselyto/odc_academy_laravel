<x-app-layout>
    <x-slot name="title">Modifier un article</x-slot>

    <h1>Modifier un article</h1>
    <!-- /resources/views/post/create.blade.php -->
 

 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        <li>{{ session('success') }}</li>
    </div>
@endif
 
<!-- Create Post Form -->
    <form method="post" action="{{ route('articles.update', $article->id) }}">
        @csrf
        @method('PUT')
        <p>
            Title : 
            <input class="form-control" type="text" name="title" value="{{ $article->title }}">
        </p>
        <p>slug :
            <textarea class="form-control" name="slug" id="" cols="30" rows="10">{{ $article->slug }}</textarea>
        </p>
        <p>Content :
            <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ $article->content }}</textarea>
        </p>
        <p>La categorie :
            <select name="categorie" id="" class="form-select">
                <option value="{{ $article->categorie->id }}">{{ $article->categorie->name }}</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
        </p>
        <p><button class="btn btn-primary" type="submit">Modifier</button></p>
    </form>
    
</x-app-layout>
    
