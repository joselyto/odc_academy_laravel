<x-app-layout>
    <x-slot name="title">Créer une catégorie</x-slot>

    <h1>Créer une catégorie</h1>
    <!-- /resources/views/post/create.blade.php -->
 
<h1>Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <p>
            Nom : 
            <input type="text" name="name">
        </p>
        <p>Description :
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </p>
        <p><button class="btn btn-primary" type="submit">Créer</button></p>
    </form>
    
</x-app-layout>
    
