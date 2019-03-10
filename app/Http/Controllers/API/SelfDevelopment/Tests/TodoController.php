<?php

namespace App\Http\Controllers\API\SelfDevelopment\Tests;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Controllers\API\BaseController;

class TodoController extends BaseController
{
    public function update(Request $request, $todo)
    {
        Todo::whereId($todo)->update($request->all());
    }

    public function store(Request $request)
    {
        return Todo::create($request->all());
    }

    public function destroy($todo)
    {
        Todo::destroy($todo);
    }
}
