<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\View;
use App\Utils\HashProvider;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    private function getRules() {
        return [
            'email'=>['email', 'unique:users'],
            'password' => ['min:8'],
            'isAdmin'=>['required']
        ];
    }
   
    private $messages = [   
        'email.email' => 'O email está inválido',
        'password.min' => 'A senha precisa ter no mínimo 8 caracteres',
        'isAdmin.required'=>'Informe se o usuário será admin.'
    ];

    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($employeeId)
    {
        $employee = Employee::find($employeeId);
        return view('newuser', compact('employee'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(isset($user)){
            return view('editUsers', compact('user'));
        }
        return redirect('/users');
    }

    public function store($employeeId ,Request $request)
    {
        $user = $this->createUser($request, $employeeId);
        $user->save();
        return redirect('/users');
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
        $request->validate(['email'=>['email', 'unique:users']], ['email.email'=>'Informe um email válido']);
        $user = User::find($id);
        $user = $this->updateUser($request,$user);
        $user->update();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(isset($user)){
            $user->delete();
        }
        return redirect('/users');
    }

    private function updateUser( $newUser, $user) {
        if(strlen ($newUser->password)>8) {
            $user->password = $newUser->password;
        }
        $user->email = $newUser->email;
        return $user;
    }

    private function createUser($request, $employeeId) {
        $request->validate($this->getRules(), $this->messages);
        if(!Employee::find($employeeId)) {
            ValidationException::withMessages([
                'employee_id'=>'O funcionário especificado não existe'
            ]);
        }
        $user = new User();
        $user->email = $request->email;
        $user->password = HashProvider::hashPassword($request->password);
        $user->employee_id = $employeeId;
        error_log($request->isAdmin == 'true');
        $user->isAdmin = $request->isAdmin == 'true';
        return $user;
    }
}
