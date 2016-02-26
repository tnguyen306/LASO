<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('favorites', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('bill_id')->references('id')->on('bills');
            $table->timestamps();
		});
        //DB::statement( 'Create VIEW fullfav AS SELECT');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('favorites', function(Blueprint $table)
		{
			$table->dropColumn(['id','user_id','bill_id','created_at','updated_at']);
		});
        //DB::statment( 'DROP VIEW fullfav' );
	}

}
