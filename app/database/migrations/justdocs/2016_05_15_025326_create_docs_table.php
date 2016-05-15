<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('docs', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->string('sharing');
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
        /** DO NOTHING FOR NOW
		$table->dropColumn('id');
        $table->dropColumn('user_id');
        $table->dropColumn('title');
        $table->dropColumn('text');
        $table->dropColumn('sharing');
        **/
	}

}
