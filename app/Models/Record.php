<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ["category"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }


    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMyTotal()
    {
        $expenseWeek = $this->where("user_id", auth()->user()->id)
            ->whereBetween("created_at", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->oldest()->get();

        $expenseMonth = $this->where("user_id", auth()->user()->id)
            ->whereBetween("created_at", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->oldest()->get();

        $incomeWeek = $this->where("user_id", auth()->user()->id)
            ->whereBetween("created_at", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "INCOME");
                });
            })->oldest()->get();

        $incomeMonth = $this->where("user_id", auth()->user()->id)
            ->whereBetween("created_at", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "INCOME");
                });
            })->oldest()->get();

        $totalExpenseWeek = $expenseWeek->map(function ($item) {
            return $item->amount;
        })->sum();
        $totalExpenseMonth = $expenseMonth->map(function ($item) {
            return $item->amount;
        })->sum();
        $totalIncomeWeek = $incomeWeek->map(function ($item) {
            return $item->amount;
        })->sum();
        $totalIncomeMonth = $incomeMonth->map(function ($item) {
            return $item->amount;
        })->sum();

        //dd($totalExpenseWeek, $totalExpenseMonth, $totalIncomeWeek, $totalIncomeMonth);

        return collect([
            "totalExpenseWeek" => $totalExpenseWeek,
            "totalExpenseMonth" => $totalExpenseMonth,
            "totalIncomeWeek" => $totalIncomeWeek,
            "totalIncomeMonth" => $totalIncomeMonth
        ]);
    }
}
