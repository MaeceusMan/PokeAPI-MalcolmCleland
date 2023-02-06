<head>
    <title>Pokemon</title>
    {{-- vue --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
</head>
  


{{-- An earlier attempt to use a separate vue page, PokemonList.vue - I couldn't get it working right, so I tried a single page instead. The old setup is still there, though not doing anything at the moment. --}}
{{-- <div id="app">
    <pokemon-list></pokemon-list>
</div> --}}

{{-- styling the pokemon data --}}
<style>
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 50px;
    }
    
    .pokemon-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .pokemon-card {
        width: 30%;
        background-color: #f2f2f2;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px 0px #ccc;
        margin-bottom: 50px;
        text-align: center;
    }
    
    .pokemon-id {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    
    .pokemon-name {
        font-size: 18px;
        margin-bottom: 20px;
    }
    
    .pokemon-sprite {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        margin-bottom: 20px;
    }
    .page-button {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        margin: 0 10px;
        cursor: pointer;
    }
    
    .page-button:hover {
        background-color: #555;
    }

    .pokemon-card-insert {
        background-color: #f2f2f2;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px 0px #ccc;
        margin-bottom: 50px;
        text-align: center;
    }
    /* button style */
    .btn {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        margin: 0 10px;
        cursor: pointer;
    }
    </style>



{{-- show the pokemon, with the first letter of the name capitalized. The Update and Delete functions weren't behaving themselves, so they were commented out. --}}
    <div class="container">
        <div class="pokemon-list">
            <div class="pokemon-card" v-for="p in pokemon">
                @foreach($pokemon as $index => $p)
                    <center>
                        <div class="col-sm-4 pokemon-card-insert">
                            
                            Pokedex ID: {{ $p->id }}<br>
                            Name: {{ ucfirst("$p->name") }}<br>
                            <img src="{{ $p->sprite }}"><br>
                            {{-- add update and delete buttons --}}
                            <button class="btn btn-primary"
                             {{-- onclick="window.location='{{ url('/pokemon/'.$p->id.'/update') }}'" --}}
                             >Update</button>
                            <button class="btn btn-danger" 
                            {{-- onclick="window.location='{{ url('/pokemon/'.$p->id.'/delete') }}'" --}}
                            >Delete</button>
                        </div>
                    </center>
                @endforeach
            </div>
        </div>
    </div>
