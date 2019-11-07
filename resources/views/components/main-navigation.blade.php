<div role="navigation">
        <a href="/">Accueil</a> -
        <a href="/contact">Contact</a> -
        <a href="/about">A propos</a>
        @Auth
        - <a href="/posts/create">creer un post</a>

        - <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
        </form>
        @endAuth
</div>