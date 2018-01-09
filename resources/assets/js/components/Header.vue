<template>
    <nav class="flex items-start justify-between flex-wrap bg-grey-darkest p-4">
        <div class="flex items-center flex-no-shrink text-grey mr-6">
            <font-awesome-icon :icon="steamIcon" size="4x"></font-awesome-icon>
            <span class="font-semibold text-4xl pl-2">{{ app.name }}</span>
        </div>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                menu
            </button>
        </div>
        <div class="block flex-grow lg:flex lg:w-auto justify-end">
            <div class="flex-col content-end">
                <div class="text-xl text-orange-dark pr-2">{{user.nickname}}</div>
                <div class="text-right mt-1">
                    <a class="btn btn-grey mr-2" href="/logout">Logout</a>
                </div>
            </div>
            <img class="rounded-full h-12 w-12 flex items-center justify-center" :src="user.avatar"></img>
        </div>
    </nav>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
    import { faSteamSquare } from '@fortawesome/fontawesome-free-brands'

    export default {
        name: 'Header',

        props: ['app', 'user'],

        computed: {
            steamIcon () {
                return faSteamSquare;
            }
        },

        components: {
            FontAwesomeIcon
        }
    }
</script>