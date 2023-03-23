<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function itemdetails(){
        return $this->hasMany(ItemDetails::class,'item_id','id');
    }
    protected function name():Attribute{
        return Attribute::make(
            get: fn($value) => strtoupper($value),
            set: fn($value) => ucfirst($value),
        );
    }
}
