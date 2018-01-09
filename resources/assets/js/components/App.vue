<template>
    <div v-if="user">
        <Header :app="app" :user="user"></Header>

        <div class="flex p-4">
            <FriendsList :user="user"></FriendsList>
        </div>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import FriendsList from './FriendsList.vue';

    let state = JSON.parse(window.__INITIAL_STATE__) || {};

    export default {
        data: () => ({
            user: state.user,
            app: state.app,
            selectedFriends: []
        }),

        components: {FriendsList, Header},

        created() {
            axios.get('/api/user')
                .then(response => {
                    this.user = response.data;

                    axios.get('/api/games/?steamid=' + this.user.steam_id)
                        .then(response => {
                            this.user.games = response.data;
                        })
                        .catch(e => {
                            console.log(e);
                        });
                })
                .catch(e => {
                    console.log(e);
                });

            
        }
    }
</script>
