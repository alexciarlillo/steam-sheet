<template>
    <div v-if="user" class="flex p-4">
        <FriendsList :user="user"></FriendsList>
    </div>
</template>

<script>
    import FriendsList from './FriendsList.vue';

    export default {
        data: () => ({
            user: null,
            selectedFriends: []
        }),

        components: {FriendsList},

        created() {
            axios.get('/api/user')
                .then(response => {
                    this.user = response.data;

                    axios.get('/api/games/?steamid=' + this.user.steam_id)
                        .then(response => {
                            this.user.games = response.data;
                            console.log(this.user.games);
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
