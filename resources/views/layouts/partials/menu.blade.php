<ul>
    <li><a href="{{ route('dashboard')}}">Tableau de bord</a></li>
    <li><a href="{{ route('categories.index') }}">Catégories</a></li>
    <li><a href="{{ route('articles.index') }}">Article</a></li>
    <li>
        {{ Auth::user()->name }} 
    </li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Deconnexion') }}
            </x-dropdown-link>
        </form> 
    </li>
</ul>