<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        foreach (range(1, 3) as $num) {
            DB::table('reports')->insert([
                'user_id' => $user->id,
                'subject_id' => 1,
                'title' => "サンプルタスク {$num}",
                'detail' => "サンプル詳細 {$num}",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
