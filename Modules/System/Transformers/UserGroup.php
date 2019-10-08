<?php

namespace Modules\System\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserGroup extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'parent' => $this->parent,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'meta' => $this->metasTransform(),
            'menus' => $this->menus,
            'permissions' => $this->permissions
        ];
    }
}
