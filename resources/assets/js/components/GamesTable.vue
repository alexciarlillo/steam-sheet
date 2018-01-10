<template>
    <div class="w-full">

        <!-- <table-component :data="">
            <div v-for="friend in selectedFriends">
                <table-column show="communityvisibilitystate" :label="friend.personaname"></table-column>
            </div>
        </table-component> -->
        <h1>Total Unique Games: {{uniqueGames.length}}</h1>
        <ul>
            <li v-for="game in uniqueGames" :key="game.appid">
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

        computed: {
            uniqueGames () {
                let friendsGames = this.selectedFriends.map(function (friend) {
                    return friend.games;
                });
                
                return _.intersectionBy(...friendsGames, this.selectedGames, 'appid');
            },
            ...mapState(['user', 'friends']),
            ...mapGetters(['selectedFriends', 'selectedGames'])
        },

        components: {
            TableComponent, TableColumn
        }
    }
</script>