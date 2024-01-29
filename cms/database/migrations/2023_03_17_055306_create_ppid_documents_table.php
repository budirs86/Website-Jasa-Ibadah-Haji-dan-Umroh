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
        Schema::create('ppid_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable(false);
            $table->integer('unit_id')->nullable(false);
            $table->string('title', 500)->nullable(false);
            $table->longText('description')->nullable(true);
            $table->integer('created_by')->nullable(false);
            $table->integer('updated_by')->nullable(true);
            $table->dateTime('deleted_at')->nullable(true);
            $table->string('slug',255)->nullable(false);
            $table->string('pic',255);
            $table->integer('view')->default(0)->nullable(false);
            $table->integer('download')->default(0)->nullable(false);
            $table->integer('aktif')->default(0)->nullable(false)->default('0');
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
        Schema::dropIfExists('ppid_documents');
    }
};
