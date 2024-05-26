<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    private $previewImg = 'preview_file';
    private $mainImg = 'main_file';

    public function store($data)
    {
        try {
            DB::beginTransaction();
            if($this->isSetPrevImage($data))
                $data[$this->previewImg] = Storage::disk('public')->put('/images', $data[$this->previewImg]);

            if(isset($data[$this->mainImg]))
                $data[$this->mainImg] = Storage::disk('public')->put('/images', $data[$this->mainImg]);

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update(array $data, Post $post)
    {
        try {
            if(isset($data['preview_file']))
                $data['preview_file'] = Storage::disk('public')->put('/images', $data['preview_file']);

            if(isset($data['main_file']))
                $data['main_file'] = Storage::disk('public')->put('/images', $data['main_file']);

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            DB::beginTransaction();
            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function isSetPrevImage($data):bool{
        return isset($data[$this->previewImg]);
    }



}
