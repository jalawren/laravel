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
        <!--<button v-if="button" @click="togglePanel">x</button>-->

        <div class="animated" transition="fade" v-if="panel">
            <div class="panel jl-panel" v-bind:class="{ 'jl-shadow': shadow }">
                <div class="panel-body">
                    <h3>
                        <span class="jl-font"> ></span>

                        <print text="jalawren.website - coming soon" time="1500"></print>

                    </h3>

                    <!--<p>-->
                        <!--<print text="> coming soon!!!" time=4500></print>-->
                    <!--</p>-->

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
                    shadow : 800,
                    cursor : 8000,
                    out    : 11000
                },

                panel    : false,
                button   : false,
                shadow   : false,
                cursor   : false,
                complete : false,
                counter  : 0
            }
        },

        methods: {

//            toggleShadow:function() {
//
//                this.shadow = ! this.shadow;
//            },

            togglePanel:function() {

                this.panel = ! this.panel;
//                this.button = ! this.button;

//                setTimeout(this.toggleShadow, this.timeouts.shadow);
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

            setTimeout(this.toggleShadow, this.timeouts.shadow);

            setTimeout(this.toggleCursor, this.timeouts.cursor);

            setTimeout(this.togglePanel, this.timeouts.out);
        }
    }


</script>