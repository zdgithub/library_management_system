<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookItem;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return \View::make('books.index')->with('books', $books);
    }
    public function readerList()
    {
        $books = Book::all();

        return \View::make('reader.booklist')->with('books', $books);
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
        ));

        $book = new Book();
        $book->isbn = $request->isbn;
        $book->name = $request->book_name;
        $book->author = $request->author_name;
        $book->price = $request->book_price;
        $book->publisher = $request->publisher;
        $book->total_num = 0;
        $book->save();
//返回图书列表页面
        return \Redirect::to(route('books'));
    }
//添加一本copy get
    public function addCopyView($id)
    {
        return \View::make('books.addcopy')
                        ->with('book_id', $id);
    }
//添加一本copy post
    public function addCopy(Request $request)
    {
        $this->validate($request, array(
          'barcode' => 'required',
          'book_id' => 'required',
        ));
        $copy = new BookItem();
        $copy->barcode = $request->barcode;
        $copy->location = $request->location;
        $copy->book_id = $request->book_id;
        $copy->state = 1;
        $copy->save();

        $book = Book::where('id', $request->book_id)->first();
        $tt = $book->total_num;
        $book->total_num = ++$tt;
        $book->save();

        return \Redirect::to(url('/book/'.$request->book_id));
    }

    public function deleteCopyView($id)
    {
        return \View::make('books.deletecopy')->with('id', $id);
    }

    public function deleteCopy(Request $request)
    {
        $item = BookItem::where('id', $request->id)->first();

        BookItem::where('id', $request->id)->delete();

        $book = Book::where('id', $item->book->id)->first();
        $tt = $book->total_num;
        $book->total_num = --$tt;
        $book->save();

        return \Redirect::to(url('/book/'.$item->book->id));
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
            'id' => 'required',
        ));

        Book::where('id', $request->id)->update(array(
            'isbn' => $request->isbn,
            'name' => $request->name,
            'author' => $request->author,
            'price' => $request->price,
            'publisher' => $request->publisher,
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

    public function readerView($id)
    {
        $book = Book::where('id', $id)->first();
        if($book){

        $bookItems = \App\BookItem::where('book_id', $book->id)->get();

        return \View::make('reader.view')
                      ->with('book', $book)
                      ->with('bookItems', $bookItems);
       }else{
         return \Redirect::to(url('/NotFound'));

       }
    }
//删除书籍post
    public function deleteBook(Request $request)
    {
        $bookItems = BookItem::where('book_id', $request->id)->get();
        $can = true;
        //该书copy已被借出去,则该书不可以删除
        foreach ($bookItems as $item) {
            if ($item->state === 0) {
                $can = false;
                break;
            }
        }

        if (!$can){
            return \Redirect::to(url('/book/'.$request->id));
        }else{
            BookItem::where('book_id', $request->id)->delete();
            Book::where('id', $request->id)->delete();
            return \Redirect::to(route('books'));
        }
    }
// 删除书籍get
    public function deleteBookView($id)
    {
        return \View::make('books.delete')->with('id', $id);
    }

}
