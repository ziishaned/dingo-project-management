<?php

Route::get('/', [
    'uses' => 'AuthController@getLogin',
    'as'   => 'auth.login',
]);

Route::get('login', ['uses' => 'AuthController@getLogin', 'as'   => 'auth.login', ]);
Route::post('login', ['uses' => 'AuthController@postLogin', ]);

Route::get('register', ['uses' => 'AuthController@getRegister', 'as'   => 'auth.register', ]);
Route::post('register', ['uses' => 'AuthController@postRegister', ]);