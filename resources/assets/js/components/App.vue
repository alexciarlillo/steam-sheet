<template>
    <div v-if="user" class="flex p-4">
        <FriendsList :user="user"></FriendsList>
    </div>
</template>

<script>
    import FriendsList from './FriendsList.vue';

    export default {
        data: () => ({
            user: null
        }),

        components: {FriendsList},

        created() {
            axios.get('/api/user')
                .then(response => {
                    this.user = response.data;
                })
                .catch(e => {
                    console.log(e);
                });
        }
    }
</script>
