<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ["type"];

    public function record()
    {
        return $this->hasMany(Record::class, "category_id");
    }

    public function type()
    {
        return $this->belongsTo(Type::class, "type_id");
    }
}
