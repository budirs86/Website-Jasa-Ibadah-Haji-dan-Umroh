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
        Schema::create('pimpinan', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->nullable(false);
            $table->string('nama_pimpinan', 100)->nullable(false);
            $table->string('nama_jabatan', 100)->nullable(false);
            $table->string('pic', 255);
            $table->integer('active')->default(0); //tidak aktif
            $table->string('masa_jabatan', 100);
            $table->integer('created_by');
            $table->integer('update_by');
            $table->dateTime('deleted_at');
            $table->integer('deleted_by');
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
        Schema::dropIfExists('pimpinan');
    }
};
