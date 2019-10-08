<?php

namespace Modules\System\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserComment extends Resource
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
            'content' => $this->content,
            'type' => $this->type,
            'author' => [
                'id' => $this->author_id,
                'ip' => $this->author_ip,
                'name' => $this->author_name,
                'email' => $this->author_email,
                'avatar' => $this->author_avatar,
                'user_agent' => $this->author_user_agent
            ],
            'meta' => $this->metasTransform(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
