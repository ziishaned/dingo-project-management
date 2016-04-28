<?php

Route::get('/', ['uses' => 'UserController@getLogin', 'as'   => 'auth.login', ]);
Route::get('login', ['uses' => 'UserController@getLogin', 'as'   => 'auth.login', ]);
Route::post('login', ['uses' => 'UserController@postLogin', ]);
Route::get('logout', function() { Auth::logout(); return redirect('/'); });
Route::get('register', ['uses' => 'UserController@getRegister', 'as'   => 'auth.register', ]);
Route::post('register', ['uses' => 'UserController@postRegister', ]);
Route::get('dashboard', ['uses' => 'UserController@getDashboard', 'as' => 'user.dashboard', ]);
Route::get('profile', ['uses' => 'UserController@getProfile', 'as' => 'user.profile', ]);

Route::get('board/{id?}', ['uses' => 'BoardController@getBoardDetail', 'as' => 'user.boardDetail', ]);
Route::post('board/postBoard', ['uses' => 'BoardController@postBoard', ]);

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