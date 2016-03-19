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
            $table->string('bill_id')->references('id')->on('bills');
            $table->timestamps();
		});
        DB::statement( 'Create VIEW fullbill AS SELECT * from (SELECT id as a_id, concat(first_name," ",last_name) as author FROM legislators)as t1 JOIN ((SELECT id as b_id, concat(first_name," ",last_name) as coauthor FROM legislators)as t2 JOIN bills on b_id=coauthor_id) on a_id=author_id');
        DB::statement('Create VIEW fullfav AS SELECT * from (fullbill JOIN (Select id as fid,user_id,bill_id from favorites) as tmp on bill_id=id)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statment( 'DROP VIEW fullbill' );
        DB::statment( 'DROP VIEW fullfav' );
		Schema::table('favorites', function(Blueprint $table)
		{
			$table->dropColumn(['id','user_id','bill_id','created_at','updated_at']);
		});
        
	}

}
