<template>
    <div id="messages-list" @scroll="scrollList">
        <div class="notification is-primary" v-bind:class="message.self ? 'is-primary' : 'is-link'" v-for="message in messages"
             v-bind:key="message.id"
        >
            <a href="" v-if="!message.self"><strong>{{message.user_from}}</strong></a>
            <strong v-else>Я</strong>
            <p>{{message.message}}</p>
            <p class="message-time">{{message.time}}</p>
        </div>

    </div>
</template>

<script>
    export default {
        props:['messages', 'blockScroll', 'down'],
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
               var vm = this;
               var percents = elem.scrollTop * 100 / elem.scrollHeight;
               if (percents < 10 && !vm.blockScroll) {
                   if (vm.messages) {
                       var firstMessage = vm.messages[0];
                       vm.$emit('upload-messages', firstMessage);
                   }
               }
            }
        },
        updated() {
            if (this.down) {
                this.$el.scrollTop = this.$el.scrollHeight;
                this.$emit('set-down', false);
            }
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