<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TypeRaceSeeder extends Seeder
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
                "date"        => "2021-09-07",
            ],
        ];
        DB::table('race')->insert($people);
    }
}
