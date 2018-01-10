<template>
    <div class="w-full">
        <!-- <table-component :data="">
            <div v-for="friend in selectedFriends">
                <table-column show="communityvisibilitystate" :label="friend.personaname"></table-column>
            </div>
        </table-component> -->
        <ul>
            <li v-for="game in combinedGames" :key="game.appid">
                {{game.name}}
            </li>
        </ul>
    </div>
</template>

<script>
    import { mapState, mapGetters } from 'vuex';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import { TableComponent, TableColumn } from 'vue-table-component';

    export default {
        name: 'GamesTable',

        props: [],

        computed: {
            combinedGames () {
                
            },
            ...mapState(['user', 'friends']),
            ...mapGetters(['selectedFriends'])
        },

        components: {
            TableComponent, TableColumn
        }
    }
</script>