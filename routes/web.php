<?php

use Core\Routing\Route;
use Core\Http\{ Request, Response };


Route::get("/", function($req, $res) {
    return $res->render("welcome");
});
