<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
            ->whereBetween("date", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->oldest()->get();

        $expenseMonth = $this->where("user_id", auth()->user()->id)
            ->whereBetween("date", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->oldest()->get();

        $incomeWeek = $this->where("user_id", auth()->user()->id)
            ->whereBetween("date", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "INCOME");
                });
            })->oldest()->get();

        $incomeMonth = $this->where("user_id", auth()->user()->id)
            ->whereBetween("date", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
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
        return $this->where("user_id", auth()->user()->id)->orderBy("date", "desc");
    }

    public function scopeFilter($query, array $fillters)
    {
        $query->when(
            $fillters["t"] ?? false,
            function ($query, $t) {
                if ($t == "week") {
                    $query->WhereBetween("date", [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                } elseif ($t == "month") {
                    $query->WhereBetween("date", [
                        Carbon::now()->startOfMonth(),
                        Carbon::now()->endOfMonth()
                    ]);
                } elseif ($t == "today") {
                    $query->whereDate("date", Carbon::today());
                }
            }
        );
    }

    public function scopeHistoryAddition()
    {
        $inflow = $this->scopeMyLastTransaction()->filter(request(["t"]))
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "INCOME");
                });
            })->sum("amount");
        $outflow = $this->scopeMyLastTransaction()->filter(request(["t"]))
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->sum("amount");

        $total = $inflow + $outflow;
        if (!request("t")) $total += auth()->user()->first_balance;


        return [
            "inflow" => $inflow,
            "outflow" => $outflow,
            "total" => $total
        ];
    }

    public function scopeRecordMonth()
    {
        $expenseMonth = $this->where("user_id", auth()->user()->id)
            ->whereBetween("date", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->oldest()->get()->toArray();

        $incomeMonth = $this->where("user_id", auth()->user()->id)
            ->whereBetween("date", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "INCOME");
                });
            })->oldest()->get();

        $expenseMonthCategoryCount = array_count_values($expenseMonth);
        $incomeMonthCategoryCount = array_count_values($incomeMonth);

        return [
            "expense" => $expenseMonthCategoryCount,
            "income" => $incomeMonthCategoryCount
        ];
    }

    public function scopeGetOnlyExpense()
    {
        return $this->where("user_id", auth()->id())->whereHas("category", function ($q) {
            $q->whereHas("type", function ($q) {
                $q->where("name", "EXPENSE");
            });
        });
    }

    public function scopeGetOnlyIncome()
    {
        return $this->where("user_id", auth()->id())->whereHas("category", function ($q) {
            $q->whereHas("type", function ($q) {
                $q->where("name", "INCOME");
            });
        });
    }

    public function scopeWeekRecordTotal()
    {
        $firstDay = Carbon::now()->startOfWeek();
        $thisWeekExpense = [
            "Monday" => $this->getOnlyExpense()->where("date", $firstDay)->get()->sum("amount"),
            "Tuesday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Wednesday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Thursday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Friday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Saturday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Sunday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
        ];

        $firstDay = Carbon::now()->startOfWeek();
        $thisWeekIncome = [
            "Monday" => $this->getOnlyIncome()->where("date", $firstDay)->get()->sum("amount"),
            "Tuesday" => $this->getOnlyIncome()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Wednesday" => $this->getOnlyIncome()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Thursday" => $this->getOnlyIncome()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Friday" => $this->getOnlyIncome()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Saturday" => $this->getOnlyIncome()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Sunday" => $this->getOnlyIncome()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
        ];

        return collect([
            "expense" => $thisWeekExpense,
            "income" => $thisWeekIncome
        ])->toJson();
    }
}
