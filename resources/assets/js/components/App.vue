<template>
    <div v-if="user">
        <div class="header">
            <Header :app="app" :user="user"></Header>
        </div>

        <div class="flex flex-wrap main">
            <FriendsList></FriendsList>
            <MainContainer></MainContainer>
            <UserGamesList></UserGamesList>
        </div>       
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    
    import Header from './Header.vue';
    import FriendsList from './FriendsList.vue';
    import UserGamesList from './UserGamesList.vue';
    import MainContainer from './MainContainer';

    export default {
        computed: mapState(['user', 'app']),

        components: { FriendsList, Header, UserGamesList, MainContainer },
    }
</script>


<style scoped>
    .header {
        height: 12vh;
    }

    .main {
        height: 88vh;
        overflow: hidden;
    }
</style>
