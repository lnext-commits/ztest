<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'first_name' => 'Жилкова',
            'last_name' => 'Елина',
            'company_id' => 1,
            'email' => 'gul@gmail.com',
            'phone' => '0502225656',
        ]);
        Employee::create([
            'first_name' => 'Васильева',
            'last_name' => 'Катерина',
            'company_id' => 1,
            'email' => 'kat@gmail.com',
            'phone' => '0502228282',
        ]);
        Employee::create([
            'first_name' => 'Проско',
            'last_name' => 'Юля',
            'company_id' => 1,
            'email' => 'ul@gmail.com',
            'phone' => '0502225454',
        ]);
    }
}
