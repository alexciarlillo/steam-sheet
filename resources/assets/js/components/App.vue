<template>
    <div v-if="user">
        <Header :app="app" :user="user"></Header>

        <div class="flex p-4">
            <FriendsList></FriendsList>
            <UserGamesList></UserGamesList>
        </div>       
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    
    import Header from './Header.vue';
    import FriendsList from './FriendsList.vue';
    import UserGamesList from './UserGamesList.vue';

    export default {
        computed: mapState(['user', 'app']),

        components: { FriendsList, Header, UserGamesList }
    }
</script>
