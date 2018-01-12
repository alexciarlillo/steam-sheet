<template>
    <div v-if="games" class="w-1/5 bg-white h-full">
        <ListFilterInput @update:filter="updateFilter" class="pl-4 border-b-2 h-16"></ListFilterInput>
        <div class="overflow-y-scroll h-full outter">
            <ul class="list-reset inner">
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

<style scoped>
    .inner {
        padding-bottom: 4rem;
    }
</style>