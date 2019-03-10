<?php

namespace App\Http\GraphQL\Types;

use App\Models\Comment;
use GraphQL\Type\Definition\ResolveInfo;

class CommentType
{
//    public function getRatingInfo(Post $root, array $args, $context, ResolveInfo $resolveInfo)
//    {
//        return [
//            'value' => $root->ratingValue
//        ];
//    }

    public function getAllNestedRepliesComments(Comment $root, array $args, $context, ResolveInfo $resolveInfo)
    {
        return $root->descendants();
    }
}
