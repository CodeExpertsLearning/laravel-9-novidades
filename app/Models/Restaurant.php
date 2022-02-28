<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Restaurant extends Model
{
    use HasFactory;

    
    public function name(): Attribute
    {
        return new Attribute(

            get: fn($value) => strtoupper($value),

            set: fn($value) => $value . ' ok '
        );
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
