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
		Schema::table('bills', function(Blueprint $table)
		{
	        $table->string('id');
            $table->string('state');
            $table->string('ext_id');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('introduced_date');
            $table->string('passed_date')->nullable();
            $table->string('revision_id')->nullable();
            $table->text('doc_path');
            $table->string('author_id')->references('id')->on('legislators');
            $table->string('coauthor_id')->references('id')->on('legislators')->nullable();
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
		Schema::table('bills', function(Blueprint $table)
		{
			$table->dropColumn('id');
			$table->dropColumn('state');
			$table->dropColumn('ext_id');
			$table->dropColumn('title');
			$table->dropColumn('text');
			$table->dropColumn('amount');
			$table->dropColumn('ext_id');
			$table->dropColumn('introduced_date');
			$table->dropColumn('passed_date');
			$table->dropColumn('revision_id');
			$table->dropColumn('doc_path');
			$table->dropColumn('author_id');
            $table->dropColumn('coauthor_id');
			$table->dropColumn('updated_at');
            $table->dropColumn('created_at');
		});
	}

}
