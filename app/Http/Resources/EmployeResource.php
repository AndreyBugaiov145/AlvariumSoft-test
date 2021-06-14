<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->when($this->resource, function () {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'patronymic' => $this->patronymic,
                'surname' => $this->surname,
                'position' => $this->position,
                'birthday' => $this->birth_at->format('j F Y г.'),
                'department' => $this->department->name,
                'salary' => $this->salary($this)
            ];
        });
    }
}
