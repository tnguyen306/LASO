<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        ini_set('memory_limit', '256M');
		Eloquent::unguard();
		//$this->call('UserTableSeeder'); //Just use registration
        $this->call('LegislatorTableSeeder'); // shouldn't change often; BE SURE TO CHECK SOMETIMES.
        $this->call('BillTableSeeder');
        
	}

}
