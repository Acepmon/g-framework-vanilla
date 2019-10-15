<?php

namespace Modules\Content\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Content extends Resource
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
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "type" => $this->type,
            "status" => $this->status,
            "visibility" => $this->visibility,
            "author" => new Author($this->author),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "meta" => $this->metasTransform(),
        ];
    }
}
