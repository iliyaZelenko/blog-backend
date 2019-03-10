<?php

namespace App\Http\Controllers\API\SelfDevelopment\KeepInMind;

use App\Models\Category;
use App\Http\Controllers\API\BaseController;

// TODO подобных контроллеров будет много, надо наследовать похожую логику от базового
class CategoriesController extends BaseController
{
    public function index()
    {
        $categories = Category::roots()->where('scope_id', 2)
//            ->with('allChildren')
//            ->withCount(['todo', 'todo as todo_completed_count' => function ($q) {
//                $q->where('completed', true);
//            }])
            ->orderBy('id', 'desc')
            ->get();

//        dump($categories->toArray());

        return response()->json($categories); // можно конечно и просто return $categories, не знаю как лучше
    }

    public function getByPath($path) {
        $category = Category::where('path', $path)
            ->with('children') // , 'keepInMindRecords'
            ->withCount('keepInMindRecords')
            ->first();

        if (!$category) {
            return $this->sendError('Category not found!', 404);
        }

        return response()->json($category);
    }

//    public function show($group)
//    {
//        return $this->getGroup($group);
//    }

//    public function store()
//    {
//        $group = Category::create(request()->all());
//        $group->todo()->create([
//            'title' => 'Your todo title'
//        ]);
//
//        return $this->getGroup($group->id);
//    }

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

//    protected function getGroup($group)
//    {
//        return Category::whereId($group)
////            ->with('todo')
////            ->withCount(['todo', 'todo as todo_completed_count' => function ($q) {
////                $q->where('completed', true);
////            }])
//            ->first();
//    }
}
