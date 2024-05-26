<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $data['preview_file'] = Storage::disk('public')->put('/images', $data['preview_file']);
        $data['main_file'] = Storage::disk('public')->put('/images', $data['main_file']);

        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $post->update($data);
        $post->tags()->sync($tagIds);

        return redirect()->route('admin.post.index');
    }
}
