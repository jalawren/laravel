<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

       <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
        <link href="/css/app.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app" @keydown="updateKey" @mousemove="updateCoordinates">

            <test-input ></test-input>
            <div class="test-div" @click="setTrue" v-show="page1">
                <h3>Page 1</h3>
            </div>
            <div class="test-div" @click="setTrue" v-show="page2">
                	<h3 style="position:absolute;left:@{{x+10}}px;top:@{{y+10}}px;">Page 2</h3>
            </div>
            <div class="test-div" v-show="page3">
                <h3>Page 3</h3>
            </div>


            @{{ 'X value: ' + x }} <br/>
            @{{ 'Y value: ' + y }} <br/>
            @{{ 'key value: ' + key }}
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
