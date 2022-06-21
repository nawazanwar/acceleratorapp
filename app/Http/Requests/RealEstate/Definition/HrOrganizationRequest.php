<?php

namespace App\Http\Requests\RealEstate\Definition;

use App\Models\RealEstate\Definition\HumanResource\HrOrganization;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HrOrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'status' => 'boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->boolean('status'),
        ]);
    }

    public function createData() {
        return HrOrganization::create($this->all());
    }

    public function updateData($id)
    {
        return HrOrganization::findorFail($id)->update($this->all());

    }

    public function deleteData($id): bool
    {
        $model = HrOrganization::findorFail($id);
        if ($model) {
            $model->deleted_by = Auth::user()->id;
            $model->save();
            $model->delete();
        }

        return true;
    }
}
