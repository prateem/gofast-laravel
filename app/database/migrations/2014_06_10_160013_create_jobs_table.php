<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
    Schema::create('jobs', function($table) {
      $table->increments('id');
      $table->string('title');
      $table->string('description');
      $table->string('requirements');
      $table->date('posted');
      $table->date('closing');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
    Schema::drop('jobs');
	}

}
