<template>
    <div v-if="games" class="w-1/5">
        <div class="rounded overflow-hidden shadow-lg bg-white">
            <ListFilterInput @update:filter="updateFilter"></ListFilterInput>
            <ul class="list-reset">
                <Game v-for="game in filteredGames" 
                    :key="game.appid" 
                    :game="game">
                </Game>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    import Game from './Game.vue';
    import ListFilterInput from './ListFilterInput.vue';

    export default {
        name: 'UserGamesList',

        components: { Game, ListFilterInput },

        data: () => ({
            filter: ''
        }),

        methods: {
            updateFilter: function(event) {
                this.filter = event;
            }
        },

        computed: {
            filteredGames () {
                return this.$store.getters.filteredGames(this.filter);
            },
            games () {
                return this.$store.state.user.games;
            }
        },
        
        created() {
            this.$store.dispatch('getSteamGamesForUser', this.$store.state.user);
        }
    }
</script>