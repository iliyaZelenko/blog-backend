<?php

namespace App\Http\GraphQL\Mutations;

use App\Exceptions\GraphQL\ValidationException;
use App\Models\Post;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Validator;

class PostMutator
{
    public function create($root, array $args, $context, ResolveInfo $resolveInfo): Post
    {
        $input = $args['input'];
        /** @var Post $created */
        $created = Post::create([
            'category_id' => $input['categoryId'],
            'user_id' => $input['userId'],
            'title' => $input['title'],
            'title_slug' => str_slug($input['title']),
            'content_short' => $input['contentShort'],
            'content' => $input['content']
        ]);

        $validator = Validator::make($input, [
            'tags.*' => 'integer|exists:post_tag,id', // check each item in the array
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }

        $created->setTags($input['tags']);

        return $created;
    }
}
