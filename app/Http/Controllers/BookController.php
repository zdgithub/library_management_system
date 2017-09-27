<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return \View::make('books.index')->with('books', $books);
    }
//添加书籍get
    public function addbookview()
    {
        return \View::make('books.add');
    }
// 添加书籍post
    public function add(Request $request)
    {
        $this->validate($request, array(
            'isbn' => 'required|unique:books,isbn',
            'book_name' => 'required',
            'author_name' => 'required',
            'book_price' => 'required',
            'total_num' => 'required|integer',
        ));

        $book = new Book();
        $book->isbn = $request->isbn;
        $book->name = $request->book_name;
        $book->author = $request->author_name;
        $book->price = $request->book_price;
        $book->publisher = $request->publisher;
        $book->total_num = $request->total_num;
        $book->save();
//返回图书列表页面
        return \Redirect::to(route('books'));
    }
//编辑图书的modal框
    public function editBookView($id)
    {
        $book_info = Book::where('id', $id)->first();

        return \View::make('books.edit')
                    ->with('book_info', $book_info);
    }
    public function editBook(Request $request)
    {
        $this->validate($request, array(
            'isbn' => 'required',
            'name' => 'required',
            'author' => 'required',
            'price' => 'required',
            'total_num' => 'required|integer',
            'id' => 'required',
        ));

        Book::where('id', $request->id)->update(array(
            'isbn' => $request->isbn,
            'name' => $request->name,
            'author' => $request->author,
            'price' => $request->price,
            'publisher' => $request->publisher,
            'total_num' => $request->total_num,
        ));

        return \Redirect::to(url('/book/'.$request->id));
    }

//返回book的详细信息
    public function view($id)
    {
        $book = Book::where('id', $id)->first();
        if($book){

        $bookItems = \App\BookItem::where('book_id', $book->id)->get();

        return \View::make('books.view')
                      ->with('book', $book)
                      ->with('bookItems', $bookItems);
       }else{
         return \Redirect::to(url('/NotFound'));

       }
    }
//删除书籍post
    public function deleteBook(Request $request)
    {
        Book::where('id', $request->id)->delete();
        return \Redirect::to(route('books'));
    }
// 删除书籍get
    public function deleteBookView($id)
    {
        return \View::make('books.delete')->with('id', $id);
    }
}
