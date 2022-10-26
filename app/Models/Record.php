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


        return collect([
            "totalExpenseWeek" => $expenseWeek->sum("amount"),
            "totalExpenseMonth" => $expenseMonth->sum("amount"),
            "totalIncomeWeek" => $incomeWeek->sum("amount"),
            "totalIncomeMonth" => $incomeMonth->sum("amount"),
        ]);
    }

    public function scopeMyLastTransaction()
    {
        return $this->where("user_id", auth()->user()->id)->latest();
    }

    public function ScopeFilter($query,array $fillters){
        $query->when(
            $fillters["time"] ?? false,
            function ($query, $t) {
                if ($t == "week") {
                    $query->WhereBetween("created_at",[Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()]);
                } elseif ($t == "mouth") {
                    $query->WhereBetween("created_at",[Carbon::now()->startOfMonth(),
                    Carbon::now()->endOfMonth()]);
                }
            }
        );
    }
}
     
