<template>
    <li class="friend flex h-10 items-center">
        <div class="info flex-grow">
            <span class="name" :class="personaStateColor">{{ friend.personaname }}</span>
        </div>
        <div class="selector">
            <i class="far fa-plus-octagon text-2xl"></i>
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
            }
        }
    }
</script>