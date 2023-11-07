<header class="">
    <div class="innerHeader">
        <div class="">HitTheHits</div>
        <div class="">
            @if(!isset($name))
            <a href="{{ route('login.authenticate') }}" class="">Login</a>
            @else
            <p class="">Bienvenido {{ $name }}</p>
            @endif
        </div>
    </div>
</header>