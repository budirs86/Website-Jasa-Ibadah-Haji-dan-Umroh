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
        Schema::create('ppid_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->nullable(false);
            $table->string('category', 200)->nullable(false);
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
        Schema::dropIfExists('ppid_categories');
    }
};
