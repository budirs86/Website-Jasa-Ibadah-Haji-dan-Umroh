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
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->nullable(false);
            $table->string('pertanyaan', 500)->nullable(false);
            $table->integer('j_1')->nullable(true)->default(0);
            $table->integer('j_2')->nullable(true)->default(0);
            $table->integer('j_3')->nullable(true)->default(0);
            $table->integer('j_4')->nullable(true)->default(0);
            $table->integer('j_5')->nullable(true)->default(0);
            $table->integer('status')->nullable(true)->default(1);
            $table->integer('created_by')->nullable(false);
            $table->integer('updated_by')->nullable(false);
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
        Schema::dropIfExists('survey');
    }
};
