// I suspect the source of my vue.js errors is here

import axios from 'axios';

const Vue = require('vue');
const PokemonList = require('./components/PokemonList.vue').default;

new Vue({
  el: '#app',
  components: {
    PokemonList
  }
});
