<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_pages', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('image_tooltip')->nullable();
            $table->string('hint')->nullable();
            $table->text('source')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
		});

        Schema::create('special_page_user', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('special_page_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('special_page_id')
                  ->references('id')
                  ->on('special_pages')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('special_page_user');
		Schema::drop('special_pages');
	}

}
