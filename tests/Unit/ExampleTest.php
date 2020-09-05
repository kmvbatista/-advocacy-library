<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Mockery;
use Illuminate\Support\Facades\View;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    protected $controller;

    protected function setUp(): void
    {
        $this->controller = new UserController();
    }

    public function testUserStore()
    {
            $request = Request::create('/store', 'POST',[
                'email'     =>     'kennedy@gmail.com',
                'password'     =>     '1245678',
                'isAdmin'     =>     0,
                'employee_id' => 54611
            ]);
            $response = $this->controller->store($request);
    }
}
