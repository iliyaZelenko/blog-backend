<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesConfigs = [
//            'tests' => '/self-development/tests/',
            'main' => '/' // /categories/
        ];

        foreach ($categoriesConfigs as $config => $urlPrefix) {
            $configPath = "categories.$config";
//            $scopeId = config("$configPath.scope");
            $tree = config("$configPath.tree");

//            , $scopeId
            $this->createCategories($tree, $urlPrefix);
        }
    }

    protected function createCategories($items, $urlPrefix, ?Category $parent = null): void
    {
        collect($items)->each(function ($item) use ($urlPrefix, $parent) {
            $fields = array_merge([
                    'parent_id' => $parent ? $parent->id : null, // $parent ? $parent->id : null, is_null($parent) ? null : $parent->id
//                    'scope_id' => $scopeId,
                    'name_slug' => str_slug($item['name']),
                    'path' => '' // дальше поставится
                ],
                array_except($item, ['_children', '_posts'])
            );

//            $category = new Category($fields);
            $category = Category::create($fields);

//            if ($parent) {
//                $parent->saveChildren($category);
//            }

            $this->setPath($category, $urlPrefix);
            $category->save();

//            if (isset($item['_posts'])) {
//                $this->createPosts($category, $item['_posts']);
//            }
//            if (isset($item['_kim_records'])) {
//                $this->createKIMRecords($category, $item['_kim_records']);
//            }
//            if (isset($parent)) {
//                $category->makeChildOf($parent);
//            }

            if (isset($item['_children'])) {
                $this->createCategories($item['_children'], $urlPrefix, $category);
            }
        });
    }

    protected function setPath(Category $model, $urlPrefix): void
    {
        if ($model->parent_id === null) {
            $pathAttribute = $model->name_slug;
        } else {
            // getAncestorsAndSelf возращает коллекцию, ancestorsAndSelf возвращал бы экземпляр Illuminate\Database\Eloquent\Builder
            $pathAttribute = $model
                ->getAncestorsAndSelf()
                ->pluck('name_slug')
                ->implode('/');
        }

        $model->path = $urlPrefix . $pathAttribute;
    }

//    protected function createPosts(Category $category, $arr): void
//    {
//        foreach ($arr as $item) {
//            $post = factory(Post::class)->make($item); // new Post($item);
//            $category->savePost($post);
//
//            $tagsCount = random_int(3, 8);
//            $tagsId = \App\Models\Tag::inRandomOrder()
//                ->take($tagsCount)
//                ->pluck('id')
//                ->all();
//
//            $post->tags()->sync($tagsId);
//        }
//    }

//    protected function createKIMRecords($category, $arr)
//    {
//        $models = [];
//
//        foreach ($arr as $item) {
//            $models[] = new KeepInMindRecord($item);
//        }
//
//        $category->keepInMindRecords()->saveMany($models);
//    }
}

