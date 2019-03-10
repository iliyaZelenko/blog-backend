<?php

namespace App\Http\Controllers\API\SelfDevelopment;

use App\Models\Scope;
use App\Http\Controllers\API\BaseController;

class ScopesController extends BaseController
{
    public function index()
    {
        $scopes = Scope::all();

//        dump($categories->toArray());

        return $scopes;
    }

//    public function show($group)
//    {
//        return $this->getGroup($group);
//    }
//
//    public function store()
//    {
//        $group = Category::create(request()->all());
//        $group->todo()->create([
//            'title' => 'Your todo title'
//        ]);
//
//        return $this->getGroup($group->id);
//    }
//
//    public function update($group)
//    {
//        Category::whereId($group)->update(request()->all());
//
//        return $this->getGroup($group);
//    }
//
//    public function destroy($group)
//    {
//        Category::destroy($group);
//    }
//
//    protected function getGroup($group)
//    {
//        return Category::whereId($group)->with('todo')
//            ->withCount(['todo', 'todo as todo_completed_count' => function ($q) {
//                $q->where('completed', true);
//            }])->first();
//    }
}
