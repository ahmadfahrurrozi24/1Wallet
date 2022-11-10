<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeCategoryChart()
    {
        $income = $this->with(
            ["record" => fn ($query) => $query->where("user_id", auth()->id()),]
        )->whereHas("type", fn ($query) => $query->where("name", "INCOME"))
            ->get()
            ->pluck("record.*.amount", "name");

        $expense = $this->with(
            ["record" => fn ($query) => $query->where("user_id", auth()->id()),]
        )->whereHas("type", fn ($query) => $query->where("name", "EXPENSE"))
            ->get()
            ->pluck("record.*.amount", "name");

        return collect([
            "expense" => $expense,
            "income" => $income
        ])->toJson();
    }
}
