<?php

class UserTableSeeder extends Seeder {
    public function run()
    {
        User::create(array(
            'email' => 'birm@rbirm.us',
            'password' => Hash::make('password')
        ));
    }
}
