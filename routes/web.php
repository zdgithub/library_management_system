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

Route::get('/ad', function () {
    return view('site.adwelcome');
});

Route::get('/NotFound', function () {
    return view('errors.503');
});

//welcome页根据书名查找书籍
Route::get('/search/books/byName','SearchController@searchBooks');
Route::get('/search/books/byAuthor','SearchController@searchBooksByAuthor');

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

// 借阅书籍的读者列表
    Route::get('borrows', 'BorrowController@index');
// 借出一本书
    Route::get('lend', 'BorrowController@lendView');
    Route::post('lend', 'BorrowController@lend');
//还一本书
    Route::get('return', 'BorrowController@returnView');
    Route::post('return', 'BorrowController@returnBook');
// 添加一本copy
    Route::get('addcopy/{id}','BookController@addCopyView');
    Route::post('addcopy','BookController@addCopy');

    Route::get('deletecopy/{id}', 'BookController@deleteCopyView');
    Route::post('deletecopy', 'BookController@deleteCopy')->name('copy.delete');

});

Route::group(['prefix' => 'reader'], function (){
    Route::group(['middleware' => 'auth.reader'], function () {

        //获得用户个人信息的页面
        Route::get('profile/{id}', 'SiteController@profileView');
        Route::post('profile', 'SiteController@profile')->name('profile.edit');

        //返回book的信息
        Route::get('book/{id}', 'BookController@readerView');
        //导航栏
        Route::get('dash', 'Reader\ReaderController@index');
        Route::get('list', 'BookController@readerList');
        Route::get('borrowinfo', 'BorrowController@readerInfo');

    });

    Route::get('login', 'Reader\LoginController@showLoginForm');
    Route::post('login', 'Reader\LoginController@login');
    Route::post('logout', 'Reader\LoginController@logout');

    Route::get('register', 'Reader\RegisterController@showRegistrationForm');
    Route::post('register', 'Reader\RegisterController@register');

});

//Route::get('/douban/{isbn}', 'BookController@douBan');

Route::post('/upload', 'FileController@uploadImage');
Route::get('/getImage/{id}', 'FileController@getImage');

Route::get('/super', 'SiteController@dashboard');




