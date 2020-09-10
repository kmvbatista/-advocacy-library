<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Book;
use App\Employee;
use App\BookCopy;
use Illuminate\Support\Facades\View;
use App\Utils\HashProvider;


class LoanController extends Controller
{
    private function getRules() {
        return [
            'date' => ['required'],
        ];
    }
   
    private $messages = [   
        'date.required' => 'A data é necessária',
    ];

    public function index()
    {
        $loans = Loan::all();
        return view('loans', compact('loans'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bookId)
    {
        $bookCopy = BookCopy::where('book_id', '=', $bookId)->first();
        return view('newLoan', compact('bookCopy'));
    }

    public function edit($id)
    {
        $loan = Loan::find($id);
        if(isset($loan)){
            return view('Loan', compact('loan'));
        }
        return redirect('/loans');
    }

    public function myLoans(Request $request) {
        $currentEmployeeId = $request->session()->get('user')->employee->id;
        $loans = Loan::where('employee_id', '=', $currentEmployeeId)->get();
        return view('myLoans', compact('loans'));
    }

    public function store($bookCopyId, Request $request)
    {
        $request->validate($this->getRules(), $this->messages);
        $loan = $this->createLoan($request, $bookCopyId);
        $loan->save();
        return redirect('/books');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function finish(Request $request) {
      $loan = Loan::find($request->id);
      $loan->status='Entregue';
      $loan->update();
      return redirect('/loans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    private function createLoan($request, $bookCopyId) {
        $loan = new Loan();
        $loan->date = $request->date;
        $loan->bookCopy_id = $bookCopyId;
        $loan->employee_id = $request->session()->get('user')->employee->id;
        $loan->status = 'Pendente';
        return $loan;
    }

    
}
