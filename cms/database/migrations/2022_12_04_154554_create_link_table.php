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
        Schema::create('link', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->string('link')->nullable(false);
            $table->integer('unit_id')->nullable(false);
            $table->integer('created_by')->nullable(false);
            $table->integer('updated_by')->nullable(false);
            $table->integer('edited_by')->nullable(true);
            $table->integer('deleted_by')->nullable(true);
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
        Schema::dropIfExists('link');
    }
};
