<template>
    <li class="friend flex h-10 items-center">
        <div class="info flex-grow">
            <span class="nickname" :class="personaStateColor">{{ friend.personaname }}</span>
            <span class="realname text-sm text-grey">{{ friend.realname }}</span>
        </div>
        <div class="selector">
            <button :class="selectedColor" v-on:click="toggleSelected">
                <i class="far fa-plus-octagon text-2xl" v-show="!friend.selected"></i>
                <i class="far fa-minus-octagon text-2xl" v-show="friend.selected"></i>
            </button>
        </div>
    </li>
</template>

<script>
    export default {
        name: 'Friend',

        props: ['friend'],

        computed: {
            personaStateColor: function() {
                switch(this.friend.personastate) {
                    case 0:
                        return 'text-gray';
                    case 1:
                        return 'text-green';
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                        return 'text-purple-dark';
                    default:
                        return 'text-black';
                }
            },

            selectedColor: function() {
                if(!this.friend.selected) {
                    return 'text-green-dark hover:text-black';
                } else {
                    return 'text-red-dark hover:text-black';
                }
            },

            isSelected: function() {
                return this.friend.selected;
            }
        },

        methods: {
            toggleSelected: function() {
                if(!this.friend.selected) {
                    this.friend.selected = true;
                } else {
                    this.friend.selected = false;
                }
            }
        }
    }
</script>