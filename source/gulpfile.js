/* globals require */

var elixir = require("laravel-elixir");

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

/* DOCUMENTACION
 | -- http://laravel.com/docs/5.0/elixir
 | -- http://laravel.com/docs/5.1/elixir
 */

elixir(function (mix) {
    mix.less("main.less", "public/css/main.css")
       .scripts(["jquery-2.1.4.min.js", "bootstrap.min.js", "Chart.min.js", "metisMenu.min.js", "sb-admin-2.js","sweetalert.min.js"], "public/js/libraries.js")
       .scripts(["questionnaires/formQuestionnaire.js"], "public/js/questionnaires.js")
       .scripts(["questionnaires/questionnaireReport.js"], "public/js/reps.js")
       .scripts(["questionnaires/questionnaireListActions.js"],"public/js/listActions.js")
       .styles(["bootstrap.min.css", "font-awesome.min.css", "metisMenu.min.css", "sb-admin-2.css","sweetalert.css"], "public/css/libraries.css")
       .version([
            "public/css/main.css",
            "public/css/libraries.css",
            "public/js/libraries.js",
            "public/js/questionnaires.js",
            "public/js/reps.js",
            "public/js/listActions.js"
        ]);
});
