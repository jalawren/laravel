<style>

    .test-input {

        padding:5px;
        font-family: courier;
        font-size:16px;
        color: #777777;
        border:1px solid dodgerblue;
        border-radius:4px;
    }

</style>

<template>

    <input class="test-input" v-model="jcommand" @focus="clearCommand" @blur="defaultCommand" @keyup.enter="storeCommand">

</template>

<script>

    export default {

        data: function() {

            return {
                jcommand: 'enter command'
            };
        },

        methods: {

            storeCommand: function() {
                if(this.jcommand.length > 0) {
                    console.log('you have entered: ' + this.jcommand);

                    this.clearCommand();
                    return false;
                }
                console.log('you didn\'t type anything');


            },
            clearCommand: function() {

                this.jcommand = '';
            },
            defaultCommand: function() {

                if(this.jcommand === '') {
                    this.jcommand = 'enter command';
                }
            }

        }

    }


</script>