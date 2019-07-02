<?php

/*front end*/

Route::group([
	// 'prefix'=>'frontend',
	'as'=>'fr.',
	'namespace'=>'Frontend'
],function(){
	Route::get('/','HomepageController@index')->name('homePage');
	Route::get('/login','LoginController@index')->name('login');
	Route::post('/handle-login','LoginController@handleLogin')->name('handleLogin');
	Route::post('/logout','LoginController@logout')->name('logout');
	Route::get('/categorie/{id}','HomepageController@getPostByCategorie')->name('categorie');
	Route::get('/single/{id}','PostController@infoPost')->name('single');
	Route::post('/add-comment','PostController@addComment')->name('addComment');
	Route::post('/rep-comment','PostController@repComment')->name('repComment');
});
Route::group([
	'prefix'=>'admin',
	'as'=>'admin.',
	'namespace'=>'Admin',
	'middleware'=>['myCheckAdminIsLogin','web']
],function(){
	Route::post('/logout-admin','LogoutController@logoutAdmin')->name('logoutAdmin');
	/*route post */
	 Route::get('/list-post','PostController@index')->name('listPost');
	Route::get('/dashboard','DashboardController@index')->name('dashboard');
	Route::get('/info-post/{id}','PostController@infoPost')->name('infoPost')->where(['id'=>'\d+']);
	Route::get('add-post','PostController@addPost')->name('addPost');
	Route::get('/edit-post/{id}','PostController@editPost')->name('editPost')->where(['id'=>'\d+']);
	Route::post('/handle-add','PostController@handleAddPost')->name('handleAddPost');
	Route::post('/handle-edit','PostController@handleEdit')->name('handleEdit');
	Route::get('/delete-post/{id}','PostController@deletePost')->name('deletePost')->where(['id'=>'\d+']);
	/*end route post*/
	/*route slide**/
	Route::get('/list-slide','SlideController@index')->name('listSlide');
	Route::get('/add-slide','SlideController@addSlide')->name('addSlide');
	Route::post('/handle-add-slide','SlideController@handleAdd')->name('handleAddSlide');
	/*end route slide*/
	/*route categories*/
	 Route::get('/list-category','CategoryController@index')->name('categories');
	 Route::get('/add-cat','CategoryController@addCat')->name('addCat');
	 Route::post('/handle-add-cat','CategoryController@handleAddCat')->name('handleAddCat');
	 Route::get('/edit-category/{id}','CategoryController@editCat')->name('editCategory');
	 Route::post('handle-edit-category','CategoryController@handleEditCat')->name('handleEditCat');
	/*end route categories*/
	/*Route user*/
	Route::get('list-user','UserController@index')->name('listUser');
	Route::get('add-user','UserController@addUser')->name('addUser');
	Route::post('handle-add-user','UserController@handleAdd')->name('handleAddUser');
	Route::get('delete-user/{id}','UserController@deleteUser')->name('deleteUser');
		Route::get('edit-user/{id}','UserController@editUser')->name('editUser');
	Route::post('/hand-edit-user','UserController@updateUser')->name('updateUser');
	/*end route user*/
});
Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');
// Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
//     ->name('ckfinder_examples');
//     Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')->middleware('isAdmin')
//     ->name('ckfinder_examples');



