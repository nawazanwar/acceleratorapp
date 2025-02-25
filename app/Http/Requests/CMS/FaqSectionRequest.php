<?php

namespace App\Http\Requests\CMS;

use App\Enum\MethodEnum;
use App\Enum\TableEnum;
use App\Models\CMS\FaqTopicSection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FaqSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        if (
            $this->isMethod(MethodEnum::POST)
            ||
            $this->isMethod(MethodEnum::PUT)
        ) {
            $edit_id = $this->model;
            if (isset($edit_id)) {
                $data['question'] = ['required', Rule::unique(TableEnum::CMS_FAQ_TOPIC_SECTIONS)->ignore($edit_id)];
            } else {
                $data['question'] = ['required', Rule::unique(TableEnum::CMS_FAQ_TOPIC_SECTIONS)];
            }
            return $data;
        } else {
            return array();
        }
    }

    public function createData()
    {
        return FaqTopicSection::create($this->all());
    }

    public function updateData($model)
    {
        return $model->update($this->all());
    }

    public function deleteData($model)
    {
        $model->deleted_by = Auth::id();
        $model->save();
        $model->delete();
    }
}
