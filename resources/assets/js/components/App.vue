<template>
    <div v-if="user">
        <Header :app="app" :user="user"></Header>

        <div class="flex p-4">
            <FriendsList></FriendsList>
            <ul>
                <li v-for="game in user.games">{{ game.name }}</li>
            </ul>
        </div>       
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    import Header from './Header.vue';
    import FriendsList from './FriendsList.vue';

    export default {
        data: () => ({
            selectedFriends: []
        }),

        computed: mapState(['user', 'app']),

        components: { FriendsList, Header },

        created() {
            this.$store.dispatch('getGamesFromSteamId', {steamid: this.user.steam_id});
        }
    }
</script>
