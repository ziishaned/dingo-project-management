<?php

Route::get('/', [
    'uses' => 'AuthController@getLogin',
    'as'   => 'auth.login',
]);

Route::get('login', ['uses' => 'AuthController@getLogin', 'as'   => 'auth.login', ]);
Route::post('login', ['uses' => 'AuthController@postLogin', ]);

Route::get('register', ['uses' => 'AuthController@getRegister', 'as'   => 'auth.register', ]);
Route::post('register', ['uses' => 'AuthController@postRegister', ]);

Route::get('logout', function() {
    Auth::logout();
    return redirect('/')->with('alert', 'You are logged out.');
});

Route::get('home', ['uses' => 'UserController@getDashboard', 'as' => 'user.dashboard', ]);
Route::get('profile', ['uses' => 'UserController@getProfile', 'as' => 'user.profile', ]);

Route::get('board', ['uses' => 'BoardController@getBoardDetail', 'as' => 'user.boardDetail', ]);

Route::post('postBoard', ['uses' => 'BoardController@postBoard', ]);
Route::post('postListName', ['uses' => 'BoardController@postListName', ]);
Route::post('postCard', ['uses' => 'BoardController@postCard', ]);
Route::post('changeCardList', ['uses' => 'BoardController@changeCardList', ]);
Route::post('delete-list', ['uses' => 'BoardController@deleteList', ]);
Route::post('update-list-name', ['uses' => 'BoardController@updateListName', ]);
Route::post('deleteCard', ['uses' => 'BoardController@deleteCard', ]);
Route::post('getCardDetail', ['uses' => 'BoardController@getCardDetail', ]);
Route::post('updateCardName', ['uses' => 'BoardController@UpdateCardName', ]);