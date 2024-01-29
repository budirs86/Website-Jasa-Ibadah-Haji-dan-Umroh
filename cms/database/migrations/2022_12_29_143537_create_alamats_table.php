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
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->nullable(false);
            $table->string('alamat', 255)->nullable(true);
            $table->string('kota', 200)->nullable(true);
            $table->string('provinsi', 100)->nullable(true);
            $table->string('kode_pos', 10)->nullable(true);
            $table->string('telepon', 15)->nullable(true);
            $table->string('email', 100)->nullable(true);
            $table->string('fax', 15)->nullable(true);
            
            $table->integer('created_by')->nullable(false);
            $table->integer('updated_by')->nullable(false);
            $table->dateTime('deleted_at');
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
        Schema::dropIfExists('alamat');
    }
};
