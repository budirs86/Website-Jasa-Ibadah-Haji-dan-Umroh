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
        Schema::table('survey', function (Blueprint $table) {
            $table->string('j_1', 200)->nullable('false')->change();
            $table->string('j_2', 200)->nullable('false')->change();
            $table->string('j_3', 200)->nullable('false')->change();
            $table->string('j_4', 200)->nullable('false')->change();
            $table->string('j_5', 200)->nullable('true')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey', function (Blueprint $table) {
            $table->integer('j_1')->default(0)->change();
            $table->integer('j_2')->default(0)->change();
            $table->integer('j_3')->default(0)->change();
            $table->integer('j_4')->default(0)->change();
            $table->integer('j_5')->default(0)->change();
           
        });
    }
};
