<style>

    @font-face {
        font-family: pressStart;
        src: url(/fonts/PressStart2P-Regular.ttf);
    }

    li {
        text-decoration: none;
        display: block;

    }

    .jl-font {
        font-family: "pressStart";

    }
    
</style>

<template>

    <h3 class="jl-font">support</h3>
    <p>
        valid
        <input type="checkbox" v-model="valid" />
    </p>
    <p>
        dl complete
        <input type="checkbox" v-model="dl" />
    </p>

    <div v-if="!valid" id="jl-support-auth">
        <form action="/support/key/auth">
            <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            <input type="text" v-model="key" placeholder="enter auth code"/>
            <input type="submit" disabled/>


        </form>
    </div>

    <div v-if="valid">
        <div v-if="!dl" id="jl-support-download">
            <p class="jl-font">
                <a href="" target="_blank">download</a>
            </p>
        </div>

        <div v-if="dl" id="jl-support-form">
            <form action="/support/submit" method="POST">
                <input type="hidden" name="machine_info" v-model="machine_info"/>
                <input type="text" name="client" value="" placeholder="Client ID"/>
                <input type="text" name="pin" value="" placeholder="PIN"/>
                <input type="submit" disabled/>
            </form>
        </div>
    </div>
    <ul>
        <li v-for="info in browser">
            {{ $key | capitalize }} {{ info }}
        </li>
    </ul>


    
</template>

<script>

    module.exports = {

        props: [],

        data:function() {

            return {

                key: "",

                valid: false,

                dl: false,

                browser: {}
            }
        },

        computed: {

        },

        methods: {
            //validate key


            getBrowser:function() {

                this.$http.get('/browser/info').then(function (response) {
//                    var data = response.data;
                    this.browser = response.data;
                    console.log(this.browser)
                });
            }

        },
        ready:function() {

            this.getBrowser();
        }
    }
</script>