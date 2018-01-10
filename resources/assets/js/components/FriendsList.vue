<template>
    <div v-if="friends" class="w-1/5">
        <div class="rounded overflow-hidden shadow-lg bg-white">
            <ListFilterInput @update:filter="updateFilter"></ListFilterInput>
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
    import ListFilterInput from './ListFilterInput.vue';

    export default {
        name: 'FriendsList',

        components: {Friend, ListFilterInput},

        data: () => ({
            filter: ''
        }),

        methods: {
            updateFilter: function(event) {
                this.filter = event;
            }
        },

        computed: {
            filteredFriends () {
                return this.$store.getters.filteredFriends(this.filter);
            },
            friends () {
                return this.$store.state.friends.all;
            }
        },
        
        created() {
            this.$store.dispatch('getFriends');
        }
    }
</script>