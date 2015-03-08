<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('levels', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('image_tooltip')->nullable();
            $table->string('hint')->nullable();
            $table->string('answer_format');
            $table->string('answer');
            $table->integer('points');
            $table->text('solution');
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
		Schema::drop('levels');
	}

}
