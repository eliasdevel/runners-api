<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $currentTimestamp = Carbon::now();
        $people = [
            [
                "name"        => "Elias Müller",
                "cpf"        => '03033083030',
                "birth_date" => '1993-09-03',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ];
        DB::table('person')->insert($people);
    }
}
