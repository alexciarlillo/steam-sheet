<template>
    <li class="game flex items-center pr-2 pl-4 py-2">
        <div class="selector mr-2">
            <button :class="selectedColor" v-on:click="toggleSelected">
                <font-awesome-icon :icon="plusIcon" v-show="!isSelected"></font-awesome-icon>
                <font-awesome-icon :icon="minusIcon" v-show="isSelected"></font-awesome-icon>
            </button>
        </div>
        <div class="info flex-grow">
            <span class="name">{{ game.name }}</span>
        </div>
    </li>
</template>

<script>
    import { mapMutations } from 'vuex';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
    import { faPlusOctagon, faMinusOctagon } from '@fortawesome/fontawesome-pro-regular'

    export default {
        name: 'Game',

        props: ['game'],

        computed: {
            isSelected () {
                return this.game.selected;
            },

            plusIcon () {
                return faPlusOctagon;
            },

            minusIcon () {
                return faMinusOctagon;
            },

            selectedColor () {
                if(!this.game.selected) {
                    return 'text-green-dark hover:text-black';
                } else {
                    return 'text-red-dark hover:text-black';
                }
            }
        },

        methods: {
            ...mapMutations(['toggleGame']),
            toggleSelected: function() {
                this.toggleGame({ game: this.game });
            }
        },

        components: {
            FontAwesomeIcon
        }
    }
</script>