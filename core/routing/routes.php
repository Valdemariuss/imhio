<?php
/**
 * @property class Router
 * @property class View
 * @property class EmailController
 */

Router::route('/', function() {
    View::render('main');
});

Router::route('/email/check', function(){
    EmailController::check();
});

Router::execute($_SERVER['REQUEST_URI']);
