<?php

namespace App\Http\Requests\Devices;

use App\Enum\MethodEnum;
use App\Enum\TableEnum;
use App\Models\Devices\DeviceModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DeviceModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        if (in_array($this->method(), [
            MethodEnum::PUT,
            MethodEnum::POST
        ])) {
            if ($this->method() == MethodEnum::PUT) {
                $model_id = $this->get('model_id');
                return [
                    'name' => ['required', Rule::unique(TableEnum::DEVICE_MODELS)->ignore($model_id)]
                ];
            } else {
                return [
                    'name' => ['required', Rule::unique(TableEnum::DEVICE_MODELS)]
                ];
            }
        } else {
            return [];
        }
    }

    public function createData()
    {
        $model = DeviceModel::create($this->all());
        if ($model) {
            $model->slug = Str::slug($model->name, '-');
            $model->save();
        }
        return $model;
    }

    public function updateData($model)
    {
        $model->update(
            $this->all()
        );
        $model->slug = Str::slug($model->name, '-');
        $model->save();
        return $model;
    }

    public function deleteData($model)
    {
        $model->deleted_by = auth()->id();
        if ($model->save()){
            return $model->delete();
        }
    }
}
