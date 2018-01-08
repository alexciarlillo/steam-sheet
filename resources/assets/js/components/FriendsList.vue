<template>
    <div v-if="friends" class="w-full">
        <div class="max-w-xs rounded overflow-hidden shadow-lg bg-white">
            <FriendListFilter @update:filter="updateFilter"></FriendListFilter>
            <ul class="list-reset">
                <Friend v-for="friend in filteredAndSortedFriends" 
                    :key="friend.steamid" 
                    :friend="friend">
                </Friend>
            </ul>
        </div>
    </div>
</template>

<script>
    import Friend from './Friend.vue';
    import FriendListFilter from './FriendListFilter.vue';

    export default {
        name: 'FriendsList',

        components: {Friend, FriendListFilter},

        props: ['user'],

        data: () => ({
            friends: null,
            filter: ''
        }),

        methods: {
            sortedFriends: function (friends) {
                return friends.sort(function(a, b) {
                    // 0 == Offline
                    // 1 == Online
                    // 2 == Busy
                    // 3 == Away
                    // 4 == Snooze
                    // 5 == LTT
                    // 6 == LTP

                    if(a.personastate === b.personastate) {
                        return a.personaname.localeCompare(b.personaname);
                    }
                    
                    if (a.personastate === 0) {
                        return 1;
                    }

                    if (b.personastate === 0) {
                        return -1;
                    }

                    return a.personastate - b.personastate;
                });
            },

            filteredFriends: function(friends) {
                return friends.filter(function(val) {
                    return val.personaname.toLowerCase().includes(this.filter.toLowerCase());
                }, this);
            },

            updateFilter: function(event) {
                this.filter = event;
            },

        },

        computed: {
            filteredAndSortedFriends: function() {
                return this.sortedFriends(this.filteredFriends(this.friends));
            }
        },
        
        created() {
            axios.get('/api/friends')
                .then(response => {
                    this.friends = response.data.map(function(friend) {
                        friend.selected = false;
                        return friend;
                    })
                })
                .catch(e => {
                    console.log(e);
                });
        }
    }
</script>