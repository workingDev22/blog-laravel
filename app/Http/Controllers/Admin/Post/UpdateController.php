<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, PostService $service, Post $post)
    {
        $data = $request->validated();

        $service->update($data, $post);

        return redirect()->route('admin.post.index');
    }
}
