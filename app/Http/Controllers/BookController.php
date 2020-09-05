<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\View;
use App\Utils\HashProvider;


class BookController extends Controller
{
    private function getRules() {
        return [
            'name'=>['required'],
            'author' => ['required'],
            'area' => ['required']
        ];
    }
   
    private $messages = [   
        'name.required' => 'O nome não pode estar em branco',
        'author.required' => 'O autor não pode estar em branco',
        'area.required' => 'A área não pode estar em branco'
    ];

    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newBook');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if(isset($book)){
            return view('editBook', compact('book'));
        }
        return redirect('/books');
    }

    public function store(Request $request)
    {
      $request->validate($this->getRules(), $this->messages);
        $book = $this->createBook($request);
        $book->save();
        return redirect('/books');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate($this->getRules(), $this->messages);
        $book = Book::find($id);
        $book = $this->updateBook($request,$book);
        $book->update();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if(isset($book)){
            $book->delete();
        }
        return redirect('/books');
    }

    private function updateBook($book, $newBook) {
      $book->name = $request->name;
      $book->author =$request->author;
      $book->area = $request->area;
    }

    private function createBook($request) {
        $book = new Book();
        $book->name = $request->name;
        $book->author =$request->author;
        $book->area = $request->area;
        return $book;
    }
}
