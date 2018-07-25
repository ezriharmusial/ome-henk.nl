<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        if ( !is_null($user) )
            DB::table('model_has_roles')->insert([
                'role_id' => 2,
                'model_type' => 'App\User',
                'model_id' => $user->id
            ]);
    }
}
