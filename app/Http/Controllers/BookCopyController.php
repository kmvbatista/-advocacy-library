<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookCopy;
use App\Book;

class BookCopyController extends Controller
{
    private function getRules() {
        return [
            'acquisitionDate'=>['required'],
            'pricePaid' => ['required'],
        ];
    }
   
    private $messages = [   
        'acquisitionDate.required' => 'É necessário informar a data de aquisição.',
        'pricePaid.required' => 'É necessário informar o valor pago.',
    ];

    public function index()
    {
        $bookCopies = BookCopy::all();
        return view('bookCopies', compact('bookCopies'));
    }

    public function list($bookId)
    {
        // $book = Book::find($bookId);
        $bookCopies = BookCopy::where('book_id', '=', $bookId)->get();
        return view('bookCopies', compact('bookCopies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bookId)
    {
        $book = Book::find($bookId);
        return view('newBookCopy', compact('book'));
    }

    public function edit($id)
    {
        $bookCopy = BookCopy::find($id);
        if(isset($bookCopy)){
            return view('editBookCopy', compact('bookCopy'));
        }
        return redirect('/bookCopies');
    }

    public function store($bookId, Request $request)
    {
        $request->validate($this->getRules(), $this->messages);
        $bookCopy = $this->createBookCopy($request, $bookId);
        $bookCopy->save();
        return redirect('/bookCopy/list/'+$bookId);
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
        $bookCopy = BookCopy::find($id);
        $bookCopy = $this->updateBookCopy($request,$bookCopy);
        $bookCopy->update();
        return redirect('/bookCopies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookCopy = BookCopy::find($id);
        if(isset($bookCopy)){
            $bookCopy->delete();
        }
        return redirect('/bookCopies');
    }

    private function updateBookCopy($bookCopy, $newBookCopy) {
        $bookCopy->password = $newBookCopy->password;
        $bookCopy->email = $newBookCopy->email;
        return $bookCopy;
    }

    private function createBookCopy($request, $bookId) {
        $bookCopy = new BookCopy();
        $bookCopy->acquisitionDate = $request->acquisitionDate;
        $bookCopy->pricePaid = $request->pricePaid;
        $bookCopy->book_id = $request->bookId;
        return $bookCopy;
    }
}
