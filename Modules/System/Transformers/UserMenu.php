<?php

namespace Modules\System\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserMenu extends Resource
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
            'link' => $this->link,
            'icon' => $this->icon,
            'order' => $this->order,
            'sublevel' => $this->sublevel,
            'module' => $this->module
        ];
    }
}
