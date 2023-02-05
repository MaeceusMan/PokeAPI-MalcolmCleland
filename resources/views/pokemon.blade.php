<head>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
</head>
  


    
{{-- <div id="app">
    <pokemon-list></pokemon-list>
</div> --}}


{{-- I got the data to show, but havent managed to figure out how to get the update and delete code fully working yet. I also wasnt sure how much of the PokeAPI data you wanted, so I settled on Name, PokeDex ID, and a Sprite of the non shiny pokemon from the front. --}}

<div class="row">
    @foreach($pokemon as $index => $p)
        @if($index % 3 == 0)
            </div><div class="row">
        @endif
        <center>
            <div class="col-sm-4">
                {{ $p->id }} - {{ $p->name }} - <img src="{{ $p->sprite }}">
            </div>
            <div>
                <form @submit.prevent="updatePokemon">
                  <input type="text" v-model="updateForm.name" placeholder="Name">
                  <input type="text" v-model="updateForm.sprite" placeholder="Sprite">
                  <button type="submit">Update</button>
                  <button @click="deletePokemon">Delete</button>
                </form>
              </div>
        </center>
    @endforeach
</div>

<div class="text-center">
    <button class="btn btn-default" @click="previousPage">Previous</button>
    <button class="btn btn-default" @click="nextPage">Next</button>
</div>

<script>
    import axios from 'axios';

    export default {
    data() {
        return {
        updateForm: {
            name: '',
            sprite: '',
        },
        };
    },
    methods: {
        async updatePokemon() {
        try {
            const { data } = await axios.put(`/api/pokemon/${this.pokemonId}`, this.updateForm);
            console.log(data);
        } catch (error) {
            console.error(error);
        }
        },
        async deletePokemon() {
        try {
            const { data } = await axios.delete(`/api/pokemon/${this.pokemonId}`);
            console.log(data);
        } catch (error) {
            console.error(error);
        }
        },
    },
    };

    var app = new Vue({
        el: '#app',
        data: {
            pokemon: [],
            page: 1,
            next: null,
            previous: null
        },
        methods: {
            nextPage() {
                if (this.next) {
                    this.page++;
                    this.getPokemon();
                }
            },
            previousPage() {
                if (this.previous) {
                    this.page--;
                    this.getPokemon();
                }
            },
            getPokemon() {
                axios.get('/api/pokemon?page=' + this.page)
                    .then(response => {
                        this.pokemon = response.data.data;
                        this.next = response.data.next_page_url;
                        this.previous = response.data.prev_page_url;
                    });
            }
        },
        mounted() {
            this.getPokemon();
        }
    });

</script>
