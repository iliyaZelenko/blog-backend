<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Http\Controllers\API\BaseController;

class CategoriesController extends BaseController
{
//    public function index()
//    {
//        $categories = Category::roots()// ->where('scope_id', 1)
////            ->with('allChildren')
////            ->withCount(['todo', 'todo as todo_completed_count' => function ($q) {
////                $q->where('completed', true);
////            }])
//            ->orderBy('id', 'desc')
//            ->get();
//
////        dump($categories->toArray());
//
//        return $categories;
//    }

//    public function getChildren($category) {
////        $category = Category::whereId($category)
////            ->with('children')
////            ->withCount('children')
////            ->first();
//
//        $categories = Category::where('parent_id', $category)
////            ->with('children')
////            ->withCount('children')
//            ->get();
//
////        dump($categories->toArray());
//        return response()->json($categories);
//    }

//    public function getByPath() {
//        $path = request()->input('path');
//        $id = request()->input('id');
//        $category = Category::query();
//
//        if ($id) {
//            $category = $category->where('id', $id);
//        } else if ($path) {
//            $category = $category->where('path', $path);
//        }
//
//        $category = $category
//            ->with('children')
////            ->withCount('children')
//            ->first();
//
//        if (!$category) {
//            return response()->json('Not found!', 404);
//        }
//
//        return response()->json($category);
//    }

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
