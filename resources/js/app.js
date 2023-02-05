import axios from 'axios';

const Vue = require('vue');
const PokemonList = require('./components/PokemonList.vue').default;

new Vue({
  el: '#app',
  components: {
    PokemonList
  }
});
