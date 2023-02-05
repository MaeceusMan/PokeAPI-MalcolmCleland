<template>
    <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Sprite</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pokemon in paginatedPokemon" :key="pokemon.id">
                <td>{{ pokemon.id }}</td>
                <td>{{ pokemon.name }}</td>
                <td><img :src="pokemon.sprite_url" /></td>
            </tr>
            </tbody>
        </table>
        <pagination
            :current-page="currentPage"
            :per-page="perPage"
            :total="total"
            @page-changed="pageChanged"
        />
    </div>
</template>
  
<script>
    import axios from 'axios';
    import Pagination from './Pagination.vue';

    export default {
        components: {
        Pagination,
        },
        data() {
        return {
            pokemon: [],
            currentPage: 1,
            perPage: 10,
        };
        },
        computed: {
        total() {
            return this.pokemon.length;
        },
        paginatedPokemon() {
            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;

            return this.pokemon.slice(start, end);
        },
        },
        mounted() {
        axios.get('/api/pokemon').then(response => {
            this.pokemon = response.data;
        });
        },
        methods: {
        pageChanged(page) {
            this.currentPage = page;
        },
        },
    };
</script>
  
<style scoped>
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
