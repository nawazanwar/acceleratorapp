<?php

namespace App\Http\Requests\CMS;

use App\Models\CMS\Blog;
use App\Services\GeneralService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array();
    }

    public function createData()
    {
        $blog = Blog::create($this->all());
        $this->saveImage($blog);
        return $blog;
    }

    public function updateData($blog)
    {
        $blog->update($this->all());
        $this->saveImage($blog);
        return $blog;
    }

    public function deleteData($model)
    {
        $model->deleted_by = Auth::id();
        $model->save();
        $model->delete();
    }

    private function saveImage($page)
    {
        if ($this->has('image')) {
            $image = $this->file('image');
            $image_name = GeneralService::generateFileName($image);
            $image_path = 'uploads/blogs/' . $image_name;
            $image->move('uploads/blogs/', $image_name);
            $page->image = $image_path;
            $page->save();
        }
    }
}
