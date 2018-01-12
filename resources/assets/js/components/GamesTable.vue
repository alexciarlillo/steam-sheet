<template>
    <div class="w-full shadow-lg-dark bg-grey p-2 min-h-full">
        <!-- <table-component :data="">
            <div v-for="friend in selectedFriends">
                <table-column show="communityvisibilitystate" :label="friend.personaname"></table-column>
            </div>
        </table-component> -->
        <h1 class="text-center mb-4">Games In Common: {{uniqueGames.length}}</h1>
        <div class="flex justify-center">
            <div class="select-random">
                <span class="text-black text-3xl mr-1">
                    Let's Play:
                </span>
                
                <span class="text-white text-3xl m2-2">
                    {{randomGame}}
                </span>

                <button class="bg-white text-black rounded py-2 px-4" v-on:click="setRandomGame()">
                    <font-awesome-icon :icon="randomIcon" size="lg"></font-awesome-icon>
                </button>
            </div>
        </div>
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
    import { faRandom } from '@fortawesome/fontawesome-pro-regular';
    import { TableComponent, TableColumn } from 'vue-table-component';

    export default {
        name: 'GamesTable',

        data: () => ({
            randomGame: ''
        }),

        methods: {
            setRandomGame () {
                let game = _.nth(this.uniqueGames, _.random(0, this.uniqueGames.length - 1));
                console.log(game);
                this.randomGame =  game.name;
            }
        },

        computed: {
            uniqueGames () {
                let friendsGames = this.selectedFriends.map(function (friend) {
                    return friend.games;
                });
                
                return _.intersectionBy(...friendsGames, this.selectedGames, 'appid');
            },
            randomIcon () {
                return faRandom;
            },
            ...mapState(['user', 'friends']),
            ...mapGetters(['selectedFriends', 'selectedGames'])
        },

        components: {
            TableComponent, TableColumn, FontAwesomeIcon, faRandom
        }
    }
</script>