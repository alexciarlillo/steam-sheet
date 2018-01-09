<template>
    <div v-if="user.friends" class="w-full">
        <div class="max-w-xs rounded overflow-hidden shadow-lg bg-white">
            <FriendListFilter @update:filter="updateFilter"></FriendListFilter>
            <ul class="list-reset">
                <Friend v-for="friend in filteredFriends" 
                    :key="friend.steamid" 
                    :friend="friend">
                </Friend>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    import Friend from './Friend.vue';
    import FriendListFilter from './FriendListFilter.vue';

    export default {
        name: 'FriendsList',

        components: {Friend, FriendListFilter},

        data: () => ({
            filter: ''
        }),

        methods: {
            updateFilter: function(event) {
                this.filter = event;
            }
        },

        computed: {
            ...mapState(['user']),
            filteredFriends () {
                return this.$store.getters.filteredFriends(this.filter);
            }
        },
        
        created() {
            this.$store.dispatch('getUserFriends');
        }
    }
</script>