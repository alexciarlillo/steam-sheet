<template>
    <li class="friend flex h-10 items-center p-2">
        <div class="info flex-grow">
            <span class="nickname" :class="personaStateColor">{{ friend.personaname }}</span>
            <span class="realname text-sm text-grey">{{ friend.realname }}</span>
        </div>
        <div class="selector">
            <button :class="selectedColor" v-on:click="toggleSelected">
                <font-awesome-icon :icon="plusIcon" v-show="!isSelected" size="lg"></font-awesome-icon>
                <font-awesome-icon :icon="minusIcon" v-show="isSelected" size="lg"></font-awesome-icon>
            </button>
        </div>
    </li>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
    import { faPlusOctagon, faMinusOctagon } from '@fortawesome/fontawesome-pro-regular'

    export default {
        name: 'Friend',

        props: ['friend'],

        computed: {
            personaStateColor () {
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

            selectedColor () {
                if(!this.friend.selected) {
                    return 'text-green-dark hover:text-black';
                } else {
                    return 'text-red-dark hover:text-black';
                }
            },

            isSelected () {
                return this.friend.selected;
            },

            plusIcon () {
                return faPlusOctagon;
            },

            minusIcon () {
                return faMinusOctagon;
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
        },

        components: {
            FontAwesomeIcon
        }
    }
</script>