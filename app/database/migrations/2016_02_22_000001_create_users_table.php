<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
	        $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
						$table->string('authkey');
            $table->string('name')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn(['id','email','password','name','photo_path','created_at','updated_at']);
		});
	}

}
