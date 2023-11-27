<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Jenssegers\Date\Date;


class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
          "id"=> $this->id,
          "user_id"=> $this->user_id,
          "subtotal" => $this->subtotal,
          'shipping_fees' => $this->shipping_fees,
          'VAT' => $this->VAT,
          'status' => $this->status,
          'total' => $this->total,
          'created_at' => Date::parse($this->created_at)->format('D, j M Y - h:i A'),
          'updated_at' => Date::parse($this->created_at)->format('D, j M Y - h:i A'),
        ];
    }
}
