<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Loan;

class EmployeeController extends Controller
{
    private function getRules() {
        return [
            'name'=>['min:8','required' ],
            'registration' => ['required']
        ];
    }
   
    private $messages = [   
        'name.min' => 'O nome precisa ter no mínimo 8 caracteres',
        'registration.required' => 'Por favor, informe a matrícula'
    ];
    public function index()
    {
        $employees = Employee::all();
        return view('employees', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NewEmployee');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        if(isset($employee)){
            return view('editEmployee', compact('employee'));
        }
        return redirect('/employees');
    }

    public function store(Request $request)
    {
        $request->validate($this->getRules(), $this->messages);
        $employee = $this->createEmployee($request);
        $employee->save();
        return redirect('/employees');
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
        $employee = Employee::find($id);
        $employee = $this->updateEmployee($request,$employee);
        $employee->update();
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if(isset($employee)){
            $user = User::where('employee_id', '=', $employee->id)->first();
            $loan = Loan::where('employee_id', '=', $employee->id)->first();
            if($user) {
                $user->delete();
            }
            if($loan) {
                $loan->delete();
            }
            $employee->delete();
        }
        return redirect('/employees');
    }

    private function updateEmployee( $request, $employee) {
        $employee->registration = $request->registration;
        $employee->OABCode =$request->OABCode;
        $employee->Name = $request->Name;
        return $employee;

    }

    private function createEmployee($request) {
        $employee = new Employee();
        $employee->registration = $request->registration;
        $employee->OABCode =$request->OABCode;
        $employee->Name = $request->name;
        return $employee;
    }
}
