@extends('layouts.index')

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
</section>

@section('main')

<script class="" type="module">
    let find = document.getElementById('inputSearch').value;
    const options = {
        method: 'GET',
        url: 'https://deezerdevs-deezer.p.rapidapi.com/search',
        params: {
            q: find
        },
        headers: {
            'X-RapidAPI-Key': 'a0a7b67c0emsh048c4d81f1755d3p1b166cjsnae42641404ab',
            'X-RapidAPI-Host': 'deezerdevs-deezer.p.rapidapi.com'
        }
    };

    try {
        const response = await axios.request(options);
        let results = document.getElementById('results');
        console.log(response.data);
        if(response.data){
            (response.data).forEach(element => {
                let search = document.createElement('li');
                search.innerHTML = element.title
                search.appendChild(results);
            });
        }
    } catch (error) {
        console.error(error);
    }
</script>
@endsection






<!-- // const data = axios.get('https://jsonplaceholder.typicode.com/posts')
// .then(function(respuesta) {
// console.log(respuesta)
// })
// .catch(function(error) {
// console.log(error)
// }) -->