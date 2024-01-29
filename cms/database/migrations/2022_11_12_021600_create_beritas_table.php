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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->integer('category_id');
            $table->string('title', 512);
            $table->longText('content');
            $table->string('slug',512);
            $table->string('pic',512);
            $table->integer('like')->default(0);
            $table->integer('read')->default(0);
            $table->integer('show')->default(0);
            $table->integer('portal')->default(0); // 0 -> only show in subdomain, 1 -> show both domain and portal
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
        Schema::dropIfExists('berita');
    }
};
