<?php

Route::get('/', ['middleware' => 'guest', 'uses' => 'UserController@getLogin', 'as'   => 'auth.login', ]);
Route::get('login', ['middleware' => 'guest', 'uses' => 'UserController@getLogin', 'as'   => 'auth.login', ]);
Route::post('login', ['middleware' => 'guest', 'uses' => 'UserController@postLogin', ]);
Route::get('logout', function() { Auth::logout(); return redirect('/'); });
Route::get('register', ['middleware' => 'guest', 'uses' => 'UserController@getRegister', 'as'   => 'auth.register', ]);
Route::post('register', ['middleware' => 'guest', 'uses' => 'UserController@postRegister', ]);
Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'UserController@getDashboard', 'as' => 'user.dashboard', ]);
Route::get('profile', ['middleware' => 'auth', 'uses' => 'UserController@getProfile', 'as' => 'user.profile', ]);
Route::get('activity', ['middleware' => 'auth', 'uses' => 'UserController@getUserActivity', 'as' => 'user.activity', ]);

Route::get('board/{id?}', ['middleware' => 'auth', 'uses' => 'BoardController@getBoardDetail', 'as' => 'user.boardDetail', ]);
Route::post('postBoard', ['middleware' => 'auth', 'uses' => 'BoardController@postBoard', ]);

Route::post('board/postListName', ['uses' => 'ListController@postListName', ]);
Route::post('board/delete-list', ['uses' => 'ListController@deleteList', ]);
Route::post('board/update-list-name', ['uses' => 'ListController@updateListName', ]);

Route::post('board/postCard', ['uses' => 'CardController@postCard', ]);
Route::post('board/changeCardList', ['uses' => 'CardController@changeCardList', ]);
Route::post('board/deleteCard', ['uses' => 'CardController@deleteCard', ]);
Route::post('board/getCardDetail', ['uses' => 'CardController@getCardDetail', ]);
Route::post('board/update-card-data', ['uses' => 'CardController@updateCardData', ]);

Route::post('board/save-comment', ['uses' => 'CommentController@saveComment', ]);

Route::post('board/save-task', ['uses' => 'TaskController@saveTask', ]);
Route::post('board/delete-task', ['uses' => 'TaskController@deleteTask', ]);
Route::post('board/update-task-completed', ['uses' => 'TaskController@updateTaskCompleted', ]);