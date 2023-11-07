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
    let find = document.getElementById('inputSearch');
    let results = document.getElementById('results');
    find.addEventListener("keypress", function(event) {
        if (event.key == "Enter") {
            let children = results.children;
            if (children) {
                while (results.firstChild) {
                    results.removeChild(results.firstChild);
                }
            }
            const options = {
                method: 'GET',
                url: 'https://deezerdevs-deezer.p.rapidapi.com/search',
                params: {
                    q: find.value
                },
                headers: {
                    'X-RapidAPI-Key': 'a0a7b67c0emsh048c4d81f1755d3p1b166cjsnae42641404ab',
                    'X-RapidAPI-Host': 'deezerdevs-deezer.p.rapidapi.com'
                }
            };

            try {
                const getData = async () => {
                    const response = await axios.request(options);
                    if (response.data.data) {
                        for (let index = 0; index < response.data.data.length; index++) {
                            let search = document.createElement('li');
                            search.innerHTML = response.data.data[index].title;
                            results.appendChild(search);
                        };
                    }
                }
                getData();
            } catch (error) {
                console.error(error);
            }
        }
    });
</script>
@endsection