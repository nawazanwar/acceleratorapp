<?php

namespace App\Http\Requests;

use App\Enum\MediaTypeEnum;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Media;
use App\Models\Office;
use App\Services\GeneralService;
use App\Services\PersonService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BuildingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required']
        ];
    }

    public function createData()
    {
        $model = Building::create($this->all());
        if ($model) {
            $this->uploadMedia($model);
            $this->saveOwners($model);
            $this->manageFloors($model);
        }
        return $model;
    }

    private function uploadMedia($model)
    {
        $documents = $this->file('documents', []);
        if (count($documents)) {
            foreach ($documents as $document) {
                $fileName = GeneralService::generateFileName($document);
                $path = 'uploads/buildings/documents/' . $fileName;
                $document->move('uploads/buildings/documents', $fileName);
                Media::create([
                    'filename' => $path,
                    'record_id' => $model->id,
                    'record_type' => MediaTypeEnum::BUILDING_DOCUMENT,
                    'building_id' => $model->id,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()
                ]);
            }
        }

        $images = $this->file('images', []);
        if (count($images)) {
            foreach ($images as $image) {
                $imageName = GeneralService::generateFileName($image);
                $imagePath = 'uploads/buildings/images/' . $imageName;
                $image->move('uploads/buildings/images', $imageName);
                Media::create([
                    'filename' => $imagePath,
                    'record_id' => $model->id,
                    'record_type' => MediaTypeEnum::BUILDING_IMAGE,
                    'building_id' => $model->id,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()
                ]);
            }
        }
    }


    private function saveOwners($model)
    {
        $model->owners()->sync([Auth::id()]);
    }

    public function updateData($id)
    {
        return Building::findorFail($id)->update($this->all());

    }

    public function deleteData($id): bool
    {
        $model = Building::find($id);
        if ($model) {
            $model->deleted_by = Auth::id();
            $model->save();
            $model->delete();
        }
        return true;
    }

    private function manageFloors($model)
    {
        $floors = $this->input('floor', array());
        if (count($floors) > 0) {
            $count = count($floors['name']);
            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $name = $floors['name'][$i];
                    $type = $floors['type'][$i];
                    $no_of_offices = $floors['no_of_offices'][$i];
                    $floor = Floor::create(
                        [
                            'building_id' => $model->id,
                            'name' => $name,
                            'type_id' => $type,
                            'no_of_offices' => $no_of_offices,
                            'created_by' => Auth::id()
                        ]
                    );
                    $this->saveOwners($model);
                    $offices = $floors[$i]['offices'];
                    if (count($offices) > 0) {
                        $floor_name_count = count($offices['name']);
                        if ($floor_name_count > 0) {
                            for ($j = 0; $j < $floor_name_count; $j++) {
                                $office_name = $offices['name'][$j];
                                $office_type = $offices['type'][$j];
                                $capacity = $offices['capacity'][$j];
                                $office = Office::create(
                                    [
                                        'building_id' => $model->id,
                                        'floor_id' => $floor->id,
                                        'name' => $office_name,
                                        'type_id' => $office_type,
                                        'sitting_capacity' => $capacity,
                                        'created_by' => Auth::id()
                                    ]
                                );
                                $this->saveOwners($office);
                            }
                        }
                    }
                }
            }
        }
    }
}
