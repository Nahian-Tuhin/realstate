<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMepServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mep_services', function (Blueprint $table) {
            $table->id();
			$table->string('title')->unique();
			$table->string('slug');
			$table->string('image');
			$table->string('meta_title')->nullable();
			$table->text('meta_description')->nullable();
			$table->mediumText('text');
			$table->tinyInteger('position')->default(1);
			$table->tinyInteger('status')->default(1)->comment('0 Inactive 1 Active');
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
        Schema::dropIfExists('mep_services');
    }
}
