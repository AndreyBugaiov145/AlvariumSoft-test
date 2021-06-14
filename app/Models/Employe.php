<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'patronymic',
        'surname',
        'position',
        'type_salary',
        'price',
        'birth_at',
        'department_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birth_at'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function scopeSalary(Builder $query, $modal)
    {
        if ($modal->type_salary == 'hour') {
            $dt = Carbon::create(Carbon::now()->startOfMonth()->toDateString());
            $dt2 = Carbon::create(Carbon::now()->endOfMonth()->toDateString());
            $count_days = $dt->diffInDaysFiltered(function (Carbon $date) {
                return !$date->isWeekend();
            }, $dt2);
            return $count_days * $modal->price * 8;
        }
        return $modal->price;
    }
}
