<template>
    <div class="columns" id="messages-data">
        <div class="column is-one-quarter chat-template">
            <chat-form
              v-bind:user_from="user_from"
              v-bind:user_to="user_to"
              v-on:sended="sended"
            >
            </chat-form>
        </div>
        <div class="column">
            <messages-list
                v-bind:messages="messageItems"
            >
            </messages-list>
        </div>
    </div>
</template>


<script>
    export default {
        props:['user_from', 'user_to', 'messages'],
        data() {
            return {
                messageItems:this.messages
            };
        },
        created() {
            var vm = this;
            window.socketService.addEventListener('message', function(event){
                var obj = JSON.parse(event.data);
                if (obj.message === 'message') {
                    var data = {};
                    for (var i in obj.data) {
                        data[i] = obj.data[i];
                    }
                    data['self'] = false;

                    vm.messageItems.push(data);
                }
            });
        },
        methods:{
            sended(event) {
               var vm = this;
               var message = {};

               for (var i in event.data) {
                   message[i] = event.data[i];
               }
               message['self'] = true;

                vm.messageItems.push(message);
            }
        }
    }
</script>