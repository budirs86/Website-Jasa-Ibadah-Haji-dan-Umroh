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
        Schema::create('survey_respondents', function (Blueprint $table) {
            $table->integer('unit_id')->nullable(false);
            $table->string('nama', 200)->nullable(false);
            $table->string('email', 200)->nullable(false);
            $table->string('tlp', 200)->nullable(true);
            $table->string('pekerjaan', 200)->nullable(false);
            $table->string('jenis_kelamin', 200)->nullable(false);
            $table->string('usia', 200)->nullable(false);
            $table->string('pendidikan', 100)->nullable(false);
            $table->string('domisili', 200)->nullable(false);
            $table->integer('created_by')->nullable(false);
            $table->integer('updated_by')->nullable(false);
            $table->dateTime('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_respondents');
    }
};
