<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'name',
        'qty',
        'table_number',
        'menu_id',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
