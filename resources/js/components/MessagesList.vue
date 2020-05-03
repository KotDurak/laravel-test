<template>
    <div id="messages-list" @scroll="scrollList">
        <div class="notification is-primary" v-bind:class="message.self ? 'is-primary' : 'is-link'" v-for="message in messages">
            <a href="" v-if="!message.self"><strong>{{message.user_from}}</strong></a>
            <strong v-else>Я</strong>
            <p>{{message.message}}</p>
            <p class="message-time">{{message.time}}</p>
        </div>

    </div>
</template>

<script>
    export default {
        props:['messages'],
        data() {
            return {

            };
        },
        mounted() {
            this.$el.scrollTop = this.$el.scrollHeight;
        },
        methods: {
            scrollList(event) {
               var elem = this.$el;
               if (elem.scrollTop <= 10) {

               }
            }
        },
        updated() {
            this.$el.scrollTop = this.$el.scrollHeight;
        }
    }
</script>

<style scoped>
    #messages-list{
        max-height: 50vh;
        overflow-y: scroll;
    }

    .message-time{
        text-align: right;
    }
</style>