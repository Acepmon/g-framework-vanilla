<?php

namespace Modules\Payment\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class PaymentMethod extends Resource
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
            'code' => $this->code,
            'name' => $this->name,
            'data' => json_decode($this->data),
            'enabled' => $this->enabled
        ];
    }
}
