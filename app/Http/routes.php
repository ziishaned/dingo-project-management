<?php

Route::get('/', [
    'uses' => 'AuthController@getLogin',
    'as'   => 'auth.login',
]);

Route::get('login', ['uses' => 'AuthController@getLogin', 'as'   => 'auth.login', ]);
Route::post('login', ['uses' => 'AuthController@postLogin', ]);

Route::get('register', ['uses' => 'AuthController@getRegister', 'as'   => 'auth.register', ]);
Route::post('register', ['uses' => 'AuthController@postRegister', ]);

Route::get('home', ['uses' => 'UserController@getDashboard', 'as' => 'user.dashboard']);
Route::get('board', ['uses' => 'UserController@getBoard', 'as' => 'user.board']);
Route::get('profile', ['uses' => 'UserController@getProfile', 'as' => 'user.profile']);