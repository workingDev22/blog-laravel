<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
//        $testTag = $tags[0];
//        $testTag->title = 'Test Tag';
//        $testTag->id = 12;
//        $tags[] = $testTag;
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
