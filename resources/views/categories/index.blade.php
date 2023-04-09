<x-app-layout>
    <x-slot name="title">Listes des categories</x-slot>
    <h1>Liste des catégories ({{ $categories->total() }})</h1>
    
    <p class="text-end"><a href="{{ route('categories.create') }}" class="btn btn-primary">+Ajouter</a></p>
    @php
        $profession = "devéloppeur";
    @endphp
    <x-test :profession="$profession" :name="__('Jean')">
        <p>Test slot</p>
        <x-slot name="titre">Laravel</x-slot>
    </x-test>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('DD/MM/Y h:mm a') }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('categories.show', $item->id)}}">Voir</a></li>
                          <li><a class="dropdown-item" href="{{ route('categories.edit', $item->id)}}">Editer</a></li>
                          <li><a class="dropdown-item" onclick="supprimer(event)" href="{{ route('categories.destroy', $item->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</a></li>
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

    {{ $categories->links() }}

     
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
    
