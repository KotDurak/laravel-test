<template>
    <div>
        <div class="field">
            <div class="control">
                <input v-model="query" class="input is-primary" @input="getSearch" type="text" placeholder="Поиск по сайту">
            </div>
        </div>
        <div v-if="items.length > 0" class="list is-hoverable">
            <a v-for="item in items" v-bind:key="item.id" v-bind:href="item.url" class="list-item">
                {{item.name}}  <span class="type">({{item.type}})</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
           return {
             notEmpty:false,
             query: '',
             items: [],
             timerId:0,
             timeout:2,
             lastRequestTime:0
           };
        },
        mounted() {

        },
        methods: {
            getSearch: function() {
                var vm = this;
                    vm.timerId = setTimeout(function(){
                        if (vm.getTime() - vm.lastRequestTime < 2) {
                            clearTimeout(vm.timerId);
                            return;
                        }
                        if (vm.query.length > 3) {
                            axios.get('/api/search', {
                                params: {
                                    query: vm.query
                                }
                            }).then(function(response) {
                                vm.lastRequestTime = vm.getTime();
                                if (response.data.result) {
                                    vm.items = response.data.result;
                                }
                            });
                        } else {
                            vm.items = [];
                        }
                    }, vm.timeout * 1000);
            },
            getTime: function() {
                return Math.floor(new Date() / 1000);
            }
        }
    }
</script>

<style>
    .list{
        position: absolute;
        width: 100%;
    }
</style>