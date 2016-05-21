<style>


    
</style>

<template>
    
        <span class="jl-font">{{ message }}</span>
    
</template>

<script>

    module.exports = {

        props: [
            {
                name: 'text',
                type: String,
                default: ''
            },
            {
                name: 'time',
                type: String,
                default: 0
            }
        ],

        data:function() {
            return {

                message     : '',
                start       : 2000,
                timeout     : 0,
                key         : 0
            }
        },

        computed: {
            array:function() {

                return this.text.split('');
            }
        },

        methods: {

            setTimer:function() {

                this.timeout = (Math.floor(Math.random() * 250) + 50);

                setTimeout(this.printOutput, this.timeout);
            },

            printOutput:function() {

                if (this.key < this.array.length) {

                    this.message += this.array[this.key];

                    this.key++;

                    this.setTimer();
                }
            }
        },

        ready:function() {

            setTimeout(this.printOutput, Number(this.time));
        }
    }
</script>