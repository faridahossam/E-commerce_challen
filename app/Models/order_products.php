<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateOrder;

class order_products extends Model
{
    use HasFactory;
    
    public function store(CreateOrder $request)
    {
        $order = $request->validated();
    }

}

