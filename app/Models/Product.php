<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',      // Name of the product
        'price',     // Price of the product
        'image',     // Image path of the product
    ];
// Product model
public function users()
{
    return $this->belongsToMany(User::class);
}


}
