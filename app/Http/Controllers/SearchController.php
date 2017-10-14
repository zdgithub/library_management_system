<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function searchBooks(Request $request){
        $output = "";


        $books = \App\Book::where('name',$request->name)->get();

        if($books){
            foreach($books as $key => $book){

            $output = '<tr>'.
                        '<td><a href="'.url('/').'/reader/book/'.$book->id.'">'.$book->name.'</a></td>'.
                        '<td>'.$book->author.'</td>'.
                        '<td>'.$book->publisher.'</td>'.
                        '<td>'.$book->copies_available().'</td>'.
                        '<td>'.$book->total_num.'</td>'.
                    '</tr>';
        }
        return $output;
      }else{
        return 'Nothing found';
      }
    }

    public function searchBooksByAuthor(Request $request){
        $output = "";


        $books = \App\Book::where('author',$request->author)->get();

        if($books){
            foreach($books as $key => $book){

            $output = '<tr>'.
                        '<td><a href="'.url('/').'/reader/book/'.$book->id.'">'.$book->name.'</a></td>'.
                        '<td>'.$book->author.'</td>'.
                        '<td>'.$book->publisher.'</td>'.
                        '<td>'.$book->copies_available().'</td>'.
                        '<td>'.$book->total_num.'</td>'.
                    '</tr>';
        }
        return $output;
      }else{
        return 'Nothing found';
      }
    }
}
