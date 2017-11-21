<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchemaGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

		Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name',40);
			$table->softDeletes();
            $table->timestamps();
        });

		Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->integer('code')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->foreign('category_id')->references('id')->on('categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
}
