<?php

namespace Modules\System\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserContent extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
