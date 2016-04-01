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
            $table->string('type');
            $table->string('item');
            $table->timestamps();
		});
        DB::statement( 'create view sml1 as SELECT id as a_id, concat(first_name," ",last_name) as author FROM legislators');
        DB::statement( 'create view sml2 as SELECT id as b_id, concat(first_name," ",last_name) as coauthor FROM legislators');
        DB::statement( 'Create VIEW fullbill AS SELECT * from sml1 as t1 JOIN (sml2 as t2 JOIN bills on b_id=coauthor_id) on a_id=author_id');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statment( 'DROP VIEW sml1' );
        DB::statment( 'DROP VIEW sml2' );
        DB::statment( 'DROP VIEW fullbill' );
		Schema::table('favorites', function(Blueprint $table)
		{
			$table->dropColumn(['id','user_id','bill_id','created_at','updated_at']);
		});
        
	}

}
