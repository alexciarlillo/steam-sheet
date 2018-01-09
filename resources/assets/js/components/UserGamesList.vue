<template>
    <div v-if="games" class="w-full">
        <div class="max-w-xs rounded overflow-hidden shadow-lg bg-white">
            <ul class="list-reset">
                <Game v-for="game in games" 
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

    export default {
        name: 'UserGamesList',

        components: { Game },

        computed: {
            games () {
                return this.$store.state.user.games;
            }
        },
        
        created() {
            this.$store.dispatch('getUserGames');
        }
    }
</script>