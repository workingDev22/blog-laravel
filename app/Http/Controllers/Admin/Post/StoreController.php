<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_file'] = Storage::put('/images', $data['preview_file']);
        $data['main_file'] = Storage::put('/images', $data['main_file']);

//        dd($data);

        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
