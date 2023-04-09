<x-app-layout>
    <x-slot name="title">Editer une catégorie</x-slot>
 
    <h1>Editer catégorie</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <p>
            Nom : 
            <input type="text" name="name" value="{{ $category->name}}">
        </p>
        <p>Description :
            <textarea name="description" id="" cols="30" rows="10">{{ $category->description}}</textarea>
        </p>
        <p><button class="btn btn-primary" type="submit">Modifier</button></p>
    </form>
    
</x-app-layout>
    
