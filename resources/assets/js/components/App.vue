<template>
    <div v-if="user">
        <Header :user="user"></Header>

        <div class="flex p-4">
            <FriendsList :user="user"></FriendsList>
        </div>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import FriendsList from './FriendsList.vue';

    export default {
        data: () => ({
            user: null,
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
