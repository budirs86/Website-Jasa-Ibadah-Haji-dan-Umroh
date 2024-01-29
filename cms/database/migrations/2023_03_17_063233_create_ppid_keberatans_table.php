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
        Schema::create('ppid_keberatan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_identitas', 20)->nullable(false);
            $table->integer('kuasa')->nullable(false)->default(0);
            $table->string('unit_id', 20)->nullable(false);     
            $table->string('nama', 100)->nullable(false);
            $table->string('alamat', 300)->nullable(false);
            $table->string('no_tlp', 20)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('alasan', 200)->nullable(false);
            $table->text('tujuan')->nullable(false);
            $table->string('pic', 200)->nullable(false);
            $table->integer('benar')->nullable(false)->default(1);
            $table->string('status', 50)->nullable(false)->default('DIPROSES');
            $table->string('tracking_no',200)->nullable(false); 
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
        Schema::dropIfExists('ppid_keberatan');
    }
};
