<template>
    <form v-on:submit.prevent="sendMessage">
        <div class="field">
            <div class="control">
                <textarea name="message" v-model="message" class="textarea" placeholder="Сообщение"></textarea>
                <input type="hidden" name="user_from" v-bind:value="user_from">
                <input type="hidden" name="user_to" v-bind:value="user_to">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Отправить</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props:{
            user_to: Number,
            user_from:Number
        },
        data() {
            return {
                message:'',
            };
        },
        methods:{
            sendMessage(){
                var data = {
                    message:this.message,
                    user_from:this.user_from,
                    user_to:this.user_to
                };

                var vm = this;

                axios.post('/api/chat/send-message', data)
                    .then(function(response){
                        var obj = {
                          message:'message',
                          users:[response.data.data.user_to],
                          data: response.data.data
                        };
                        socketService.send(JSON.stringify(obj));
                        vm.message = '';
                        vm.$emit('sended', obj);
                    }).catch(function(error){
                        console.log(error);
                });
            }
        },
        mounted(){

        }
    }
</script>