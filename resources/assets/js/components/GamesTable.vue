<template>
    <div class="w-full">
        <table-component :data="selectedFriends">
            <div v-for="friend in selectedFriends">
                <table-column show="communityvisibilitystate" :label="friend.personaname"></table-column>
            </div>
        </table-component>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import { TableComponent, TableColumn } from 'vue-table-component';

    export default {
        name: 'GamesTable',

        props: [],

        computed: {
            selectedFriends () {
                return this.$store.getters.selectedFriends;
            }
        },

        components: {
            TableComponent, TableColumn
        }
    }
</script>