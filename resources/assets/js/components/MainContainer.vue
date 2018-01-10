<template>
    <div class="w-3/5 px-2">
        <div class="rounded overflow-hidden shadow-lg bg-white h-64">
            <GamesTable></GamesTable>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import GamesTable from './GamesTable';

    export default {
        name: 'MainContainer',

        props: [],

        computed: {
        },

        components: {
            GamesTable
        }
    }
</script>