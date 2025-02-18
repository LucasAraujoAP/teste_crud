<?php
// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'value'];

    protected $casts = [
        'value' => 'decimal:2'
    ];

    public function setSKUAttribute($value)
    {
        $this->attributes['sku'] = preg_replace('/[^0-9]/', '', $value);
    }
}
