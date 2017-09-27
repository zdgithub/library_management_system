<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('site.welcome');
});

Route::get('/NotFound', function () {
    return view('errors.503');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'SiteController@index')->name('home');
//booklist页面
    Route::get('books', 'BookController@index')->name('books');

// 添加图书页面
    Route::get('addbook', 'BookController@addbookview');
    Route::post('addbook', 'BookController@add')->name('book.add');
// 图书编辑页面
    Route::get('book/edit/{id}', 'BookController@editBookView');
    Route::post('book/edit', 'BookController@editBook')->name('book.edit');
//返回book的信息
    Route::get('book/{id}', 'BookController@view');
// 删除book(这一类)
    Route::get('book/delete/{id}', 'BookController@deleteBookView');
    Route::post('book/delete', 'BookController@deleteBook')->name('book.delete');
//welcome页根据书名查找书籍
    Route::get('/search/books/byName','SearchController@searchBooks');

//获得用户个人信息的页面
    Route::get('profile/{id}', 'SiteController@profileView');
    Route::post('profile', 'SiteController@profile')->name('profile.edit');

// 借阅书籍的读者列表
    Route::get('borrows', 'BorrowController@index');
// 借出一本书
    Route::get('lend', 'BorrowController@lendView');
    Route::post('lend', 'BorrowController@lend');
// 添加一本copy
    Route::get('addcopy/{id}','BookController@addCopyView');
    Route::post('addcopy','BookController@addCopy');

    Route::get('deletecopy/{id}', 'BookController@deleteCopyView');
    Route::post('deletecopy', 'BookController@deleteCopy')->name('copy.delete');


    Route::get('borrowers', 'BorrowersController@index')->name('borrowers');
    Route::post('borrowers', 'BorrowersController@add')->name('borrowers.add');

});

