<x-app-layout>
    <x-slot name="title">Listes des articles</x-slot>
    <h1>Liste des articles ({{ $articles->total() }})</h1>
    
    <p class="text-end"><a href="{{ route('articles.create') }}" class="btn btn-primary">+Ajouter</a></p>
    @if(session('success'))
        <div class="alert alert-success">
            <li>{{ session('success') }}</li>
        </div>
    @endif
  
    @if(session('success1'))
        <div class="alert alert-danger">
            <li>{{ session('success1') }}</li>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>
                <th>Categorie</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('DD/MM/Y h:mm a') }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->categorie->name }}</td>
                    <td>
                        @if($item->pic)
                            <img src="{{ Storage::url($item->pic) }}" class="img-fluid" alt="">
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('articles.show', $item->id)}}">Voir</a></li>
                            <li><a class="dropdown-item" href="{{ route('articles.edit', $item->id)}}">Editer</a></li>
                            <li><a class="dropdown-item" onclick="supprimer(event)" href="{{ route('articles.destroy', $item->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</a></li>
                            </ul>
                        </div>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        Aucun enregistrement
                    </td>
                </tr>  
            @endforelse
            
        </tbody>
    </table>

    {{ $articles->links() }}

     
  <!-- Modal -->
  <x-suppr :title="__('Catégorie')" />


<x-slot name="scripts">
    <script>
        function supprimer(event) {
            
            var route = event.target.getAttribute('href')
            deleteForm.setAttribute('action', route)
            //alert(route)
        }
    </script>
</x-slot>
    

</x-app-layout>
    
