<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegislatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('legislators', function(Blueprint $table)
		{
            $table->string('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('state');
            $table->string('branch');
            $table->string('district');
            $table->string('photo_path')->nullable();
            $table->string('bio')->nullable();
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
		Schema::table('legislators', function(Blueprint $table)
		{
			$table->dropColumn(['id','first_name','last_name','state','branch','district','photo_path','bio','created_at','updated_at']);
		});
	}

}
