<template>
    <li class="game flex h-10 items-center">
        <div class="info flex-grow">
            <span class="name">{{ game.name }}</span>
        </div>
    </li>
</template>

<script>
    export default {
        name: 'Game',

        props: ['game'],

        computed: {
        },

        methods: {
        },

        components: {
        }
    }
</script>