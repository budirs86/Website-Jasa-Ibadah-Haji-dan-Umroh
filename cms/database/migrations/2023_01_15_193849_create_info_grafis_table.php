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
        Schema::create('info_grafis', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->string('description', 500);
            $table->integer('unit_id')->nullable(false);
            $table->integer('created_by')->nullable(true);
            $table->integer('updated_by')->nullable(true);
            $table->dateTime('deleted_at')->nullable(true);;
            $table->string('slug',255)->nullable(false);
            $table->string('pic',255);
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
        Schema::dropIfExists('info_grafis');
    }
};
