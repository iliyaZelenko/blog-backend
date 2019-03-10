<?php

namespace App\Http\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use App\Models\Category;

class CategoriesQuery
{
    public function getRoots($root, array $args, $context, ResolveInfo $resolveInfo)
    {
        return Category::roots()
            ->orderBy('id', 'desc')
            ->get();

        // ->where('scope_id', 1)
//            ->with('allChildren')
//            ->withCount(['todo', 'todo as todo_completed_count' => function ($q) {
//                $q->where('completed', true);
//            }])
    }

    public function getByPath($root, array $args, $context, ResolveInfo $resolveInfo)
    {
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
//
//
//        return DB::table('posts')
//            ->where('visible', true)
//            ->where('posted_at', '>', $args['after']);
    }
}
