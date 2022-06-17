<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_queries', function (Blueprint $table) {
            $table->id();
            $table->string('property_slug')->comment('Property slug on property table');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->text('default_message');
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
        Schema::dropIfExists('property_queries');
    }
}
