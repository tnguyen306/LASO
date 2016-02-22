<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bill', function(Blueprint $table)
		{
	        $table->string('id');
            $table->string('state');
            $table->string('ext_id');
            $table->string('title');
            $table->string('text')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('introduced_date');
            $table->string('passed_date')->nullable();
            $table->string('revision_id')->nullable();
            $table->string('doc_path');
            $table->string('author_id');
            $table->string('coauthor_id')->nullable();
            $table->string('author_id')->references('id')->on('legislators');
            $table->string('coauthor_id')->references('id')->on('legislators');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bill', function(Blueprint $table)
		{
			//
		});
	}

}
