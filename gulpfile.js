var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.phpSpec();
});

//gulp.task('test', function() {
//    gulp.src('spec/**/*.php')
//        .pipe(run('clear'))
//        .pipe(phpspec('', { 'verbose': 'v', notify: true }))
//        .on('error', notify.onError({
//            title: "Aw, Shucks!",
//            message: "Your tests failed, Jason!",
//            icon: __dirname + '/fail.png'
//        }))
//        .pipe(notify({
//            title: "Success",
//            message: "All tests have returned error free!"
//        }));
//});
//
//gulp.task('watch', function() {
//    gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
//});
//
//gulp.task('default', ['test', 'watch']);