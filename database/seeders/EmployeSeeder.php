<?php

namespace Database\Seeders;

use App\Models\Employe;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i<10;$i++) {
            Employe::create(
                [
                    'name' => "Oleg-+$i",
                    'patronymic' => 'Ivanovich',
                    'surname' => 'Vorobey',
                    'position' => 'developer',
                    'type_salary' => 'month',
                    'price' => 3000,
                    'department_id' => 1,
                    'birth_at' => Carbon::now()
                ]);
            Employe::create(
                [
                    'name' => "Dima+$i",
                    'patronymic' => 'Antonovich',
                    'surname' => 'Somov',
                    'position' => 'tester',
                    'type_salary' => 'hour',
                    'price' => 15,
                    'department_id' => 2,
                    'birth_at' =>Carbon::now()
                ]);
        }
    }
}
