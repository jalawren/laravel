<style>


    h3 {
        font-size: 16px;
        color: limegreen;
        margin: 25px  0 15px 40px;
    }
    p {
        margin-left: 40px;

    }


    .jl-bpld {
        font-weight: bolder;
    }

    .jl-panel {
        /*width: 600px;*/
        height: 500px;
        padding: 10px;
        border-radius: 0;
        text-align:left;
        background-color: #000000;

        /*background: url('/images/jl-screen.gif');*/
        /*background-size: cover;*/
        /*background-repeat: no-repeat;*/
    }
    .jl-shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /*box-shadow:10px 10px;*/
    }
</style>

<template>

        <div class="animated" transition="fade" v-if="panel">
            <div class="panel jl-panel">
                <div class="panel-body">
                    <h3>
                        <span class="jl-font"> ></span>

                        <print text="jasontlawrence.com - coming soon" time="1800"></print>

                    </h3>
                    <p>
                        <span v-if="complete" class="jl-font"> ></span>

                        <span v-if="cursor" class="jl-font jl-bold">|</span>
                    </p>
                </div>
            </div>
        </div>
</template>

<script>

    import Print from './Print.vue';

    module.exports = {

        components: { Print },

        data:function() {

            return {

                timeouts: {

                    panel  : 1200,
                    cursor : 10000,
                    out    : 15000
                },

                panel    : false,
                button   : false,
                cursor   : false,
                complete : false,
                counter  : 0
            }
        },

        methods: {

            togglePanel:function() {

                this.panel = ! this.panel;
            },

            toggleCursor:function() {

                if (this.counter < 10) {

                    if (this.complete === false) {

                        this.complete = true;
                    }

                    this.cursor = ! this.cursor;

                    this.counter++;

                    setTimeout(this.toggleCursor, 1000);
                }
                this.button = true;
            }
        },

        ready:function() {

            setTimeout(this.togglePanel, this.timeouts.panel);

            setTimeout(this.toggleCursor, this.timeouts.cursor);

            setTimeout(this.togglePanel, this.timeouts.out);
        }
    }


</script>