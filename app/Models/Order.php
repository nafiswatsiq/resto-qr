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
        'table_number',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function orderMenu()
    {
        return $this->belongsToMany(Menu::class)->withPivot('qty');
    }

    public function orderQty()
    {
        return $this->belongsToMany(Menu::class)->withPivot('qty');
    }
}
