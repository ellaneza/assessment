<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	$sql = file_get_contents(database_path() . '/seeds/sql/user.sql');
    
         DB::statement($sql);
    }
}
