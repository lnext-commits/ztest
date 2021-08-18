<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company_name' => 'Smuga',
            'email' => 'smuga@gmail.com',
            'website' => 'petr.org',
            'logo' => 'petr.png'
        ]);
    }
}
