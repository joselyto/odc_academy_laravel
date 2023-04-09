<x-app-layout>
    <x-slot name="title">Créer un article</x-slot>

    <h1>Créer un article</h1>
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
    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
            Title : 
            <input class="form-control" type="text" name="title">
        </p>
        <p>slug :
            <textarea class="form-control" name="slug" id="" cols="30" rows="10"></textarea>
        </p>
        <p>Content :
            <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
        </p>
        <p>La categorie :
            <select name="categorie" id="" class="form-select">
                <option value="">Veuillez selectionner la categorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
        </p>
        <p>Picture :
            <input class="form-control" name="pic" type="file" accept="images/*">
        </p>
        <p><button class="btn btn-primary" type="submit">Créer</button></p>
    </form>
    
</x-app-layout>
    
