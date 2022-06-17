<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->integer('category_id')->comment('PK on categories table');
            $table->integer('admin_id')->comment('PK on admins table');
            $table->integer('size_sqft')->comment('1000')->nullable();
            $table->string('address');
            $table->string('image');
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->string('rental_period')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->string('is_ongoing', 20)->nullable()->default('ready');
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('status')->nullable()->default(1)->comment('1 = Published, 0 = Unpublished');
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
        Schema::dropIfExists('properties');
    }
}
