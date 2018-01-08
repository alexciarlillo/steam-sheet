<template>
    <div class="p-2">
        <input v-model="filterString" type="text" placeholder="Search" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"/>
    </div>
</template>

<script>
    export default {
        name: 'FriendListFilter',

        data: () => ({
            'filterString': ''
        }),

        computed: {},

        watch: {
            filterString: function(newString) {
                this.$emit('update:filter', newString);
            }
        },
    }
</script>