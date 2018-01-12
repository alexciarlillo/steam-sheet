<template>
    <div class="w-3/5 z-10 overflow-y-scroll h-full shadow-lg-dark">
        <GamesTable></GamesTable>
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