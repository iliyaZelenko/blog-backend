<?php

namespace App\Http\Controllers\API\SelfDevelopment\KeepInMind;

use App\Models\KeepInMindRecord;
use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;

class RecordsController extends BaseController
{
    const RECORDS_PER_REQUEST = 20;

    public function index(Request $request)
    {
        $alreadySeen = $request->alreadySeen;
        $categoryId = $request->categoryId;
//        $records = KeepInMindRecord::whereNotIn('id', $alreadySeen)
//            ->where('category_id', $categoryId)
////            ->orderBy('id', 'desc')
//            ->limit(static::RECORDS_PER_REQUEST)
//            ->get();
        $records = $this->getRecordQuery($categoryId)
            ->whereNotIn('id', $alreadySeen)
            ->limit(static::RECORDS_PER_REQUEST)
            ->get();

        // если меньше чем надо, то взять из тех что повторялись
        if ($records->count() < static::RECORDS_PER_REQUEST) {
            $moreRecords = $this->getRecordQuery($categoryId)
                ->whereIn('id', $alreadySeen)
                ->get();
            $records = $records->merge($moreRecords);
        }

//        $records = $records->sortByDesc('id');

        return response()->json($records);
    }

    protected function getRecordQuery ($categoryId) {
        return KeepInMindRecord::where('category_id', $categoryId)
            ->orderBy('id', 'desc');
//            ->limit(static::RECORDS_PER_REQUEST)
//            ->get();
    }
//
//    public function getByPath($path) {
////        $category = Category::whereId($category)
////            ->with('children')
////            ->withCount('children')
////            ->first();
//
//        $category = Category::where('path', $path)
//            ->with('children', 'keepInMindRecords')
////            ->withCount('children')
//            ->first();
//
//        if (!$category) {
//            return $this->sendError('Category not found!', 404);
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
