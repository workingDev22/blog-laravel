<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, PostService $service)
    {
        $data = $request->validated();
        $service->store($data);

        return redirect()->route('admin.post.index');
    }
}
