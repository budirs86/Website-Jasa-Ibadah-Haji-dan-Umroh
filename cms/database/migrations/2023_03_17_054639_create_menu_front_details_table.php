<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_front_details', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->integer('created_by');
            $table->string('title', 255)->nullable(false);
            $table->string('link', 255)->nullable(false);
            $table->dateTime('deleted_at')->nullable(true);
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
        Schema::dropIfExists('menu_front_details');
    }
};
