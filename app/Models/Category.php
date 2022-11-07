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
        $income = $this->with(["record", "type"])->whereHas("record", function (Builder $q) {
            $q->where("user_id", auth()->id());
        })->whereHas("type", function (Builder $q) {
            $q->where("name", "INCOME");
        })->get()->pluck("record.*.amount", "name");

        $expense = $this->with(["record", "type"])->whereHas("record", function (Builder $q) {
            $q->where("user_id", auth()->id());
        })->whereHas("type", function (Builder $q) {
            $q->where("name", "EXPENSE");
        })->get()->pluck("record.*.amount", "name");

        return collect([
            "expense" => $expense,
            "income" => $income
        ])->toJson();
    }
}
