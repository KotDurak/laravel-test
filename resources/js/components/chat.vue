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
                v-on:upload-messages="uploadMessages"
                v-on:set-down="setDown"
                v-bind:blockScroll="blockScroll"
                v-bind:down="down"
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
                messageItems:this.messages,
                blockScroll:false,
                down:false,
                stopUpload:false
            };
        },
        created() {

            window.socketService.addEventListener('message', this.getMessage);
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
                this.down = true;
            },
            getMessage(event) {
                var vm = this;
                var obj = JSON.parse(event.data);
                if (obj.message === 'message') {
                    var data = {};
                    for (var i in obj.data) {
                        data[i] = obj.data[i];
                    }
                    data['self'] = false;
                    vm.messageItems.push(data);
                    this.down = true;
                }
            },
            uploadMessages(message) {
                if (this.stopUpload) {
                    return;
                }
                var vm = this;
                vm.blockScroll = true;
                axios.post('/api/chat/upload-message', {
                    id:message.id,
                    self:message.self
                }).then(function(response){
                     if ( response.data.messages.length === 0)  {
                         vm.stopUpload = true;
                     }
                     vm.messageItems = response.data.messages.concat(vm.messageItems);
                     vm.blockScroll = false;
                });
            },
            setDown(value) {

                this.down = value;
            }
        }
    }
</script>