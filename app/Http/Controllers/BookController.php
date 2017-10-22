<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookItem;
use App\Borrow;

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
            'book_price' => 'required|numeric|min:0',
            'total_num' => 'required|integer|min:1',
        ));

        $book = new Book();
        $book->isbn = $request->isbn;
        $book->name = $request->book_name;
        $book->author = $request->author_name;
        $book->price = $request->book_price;
        $book->publisher = $request->publisher;
        $book->total_num = $request->total_num;
        $book->location = $request->location;
        $book->save();

        $num = $request->total_num;
        for($i = 0; $i < $num; $i++) {
            $copy = new BookItem();
            $copy->book_id = $book->id;
            $copy->state = 1;
            $copy->save();

            $copy->barcode = $copy->id + 100000;
            $copy->save();
        }

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
          'book_id' => 'required',
          'num' => 'required|integer|min:1'
        ));

        for ($j = 0; $j < $request->num; $j++) {
            $copy = new BookItem();
            $copy->book_id = $request->book_id;
            $copy->state = 1;
            $copy->save();

            $copy->barcode = $copy->id + 100000;
            $copy->save();
        }

        $book = Book::where('id', $request->book_id)->first();
        $tt = $book->total_num;
        $book->total_num = $tt + $request->num;
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
        $book = Book::where('id', $item->book_id)->first();
        $tt = $book->total_num;
        $book->total_num = --$tt;

        Borrow::where('book_item_id', $request->id)->delete();
        BookItem::where('id', $request->id)->delete();

        if($book->total_num == 0){
            $book->delete();
            return \Redirect::to(route('books'));
        }else{
            $book->save();
            return \Redirect::to(url('/book/'.$book->id));
        }
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
            'price' => 'required|numeric|min:0',
            'id' => 'required',
        ));

        Book::where('id', $request->id)->update(array(
            'isbn' => $request->isbn,
            'name' => $request->name,
            'author' => $request->author,
            'price' => $request->price,
            'location' => $request->location,
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
            if ($item->state == 0) {
                $can = false;
                break;
            }
        }

        if (!$can){
            return \Redirect::to(url('/book/'.$request->id))
             ->with('msg', "You can not delete the book, because a copy of it is borrowed.");
        }else{
            $items = BookItem::where('book_id', $request->id)->get();
            foreach ($items as $it) {
                Borrow::where('book_item_id', $it->id)->delete();
            }

            BookItem::where('book_id', $request->id)->delete();
            \App\Models\Image::where('book_id', $request->id)->delete();
            Book::where('id', $request->id)->delete();
            return \Redirect::to(route('books'));
        }
    }
// 删除书籍get
    public function deleteBookView($id)
    {
        return \View::make('books.delete')->with('id', $id);
    }

    //豆瓣api
    public function douBan($isbn)
    {
        $requesturl="https://api.douban.com/v2/book/isbn/".$isbn;
//curl方式获取json数组
        $curl = curl_init(); //初始化
        curl_setopt($curl, CURLOPT_URL, $requesturl);//设置抓取的url
        curl_setopt($curl, CURLOPT_HEADER, 0);//设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($curl);//执行命令
        curl_close($curl);//关闭URL请求
        //显示获得的数据
        //dd($data);
        $obj=json_decode($data);

        $result=$obj->success;
        if ($result!=1) {
            {exit('对不起域名受限');}
        }
    }

}
