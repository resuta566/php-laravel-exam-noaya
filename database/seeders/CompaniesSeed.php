<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 15; $i++ )
        {
            DB::table('companies')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@mail.com',
                'logo' => Str::random(10),
                'website' => "www.".Str::random(5).".com",
            ]);
        }
    }
}
