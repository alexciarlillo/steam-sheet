<template>
    <div v-if="friends" class="friends-list w-1/5 bg-white h-full">
        <ListFilterInput @update:filter="updateFilter" class="pr-4 border-b-2 h-16"></ListFilterInput>
        <div class="overflow-y-scroll h-full outter">
            <ul class="list-reset inner">
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
    import ListFilterInput from './ListFilterInput.vue'

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

<style scoped>
    .outter {
        transform: scaleX(-1);
    }

    .inner {
        transform: scaleX(-1);
        padding-bottom: 4rem;
    }
</style>