@extends('layouts.index')

@section('main')
<section class="">
    <div class="">
        <div class="">
            <h1 class=""></h1>
        </div>
        <div class="">
            <h4 class="">Buscador</h4>
            <input type="text" id="inputSearch">
            <ul id="results"></ul>
        </div>
    </div>
    <input type="hidden" class="" id="token" value="{{ $token }}">
</section>

<script class="" type="module">
    let token = document.getElementById('token').value;
    window.onload = function() {
        axios({
                method: 'get',
                url: `https://cors-anywhere.herokuapp.com/api.deezer.com/album/302127`,
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
            })
            .then(function(response) {
                console.log(res.data)
            })
    }
</script>
@endsection