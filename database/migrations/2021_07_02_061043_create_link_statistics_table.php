<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained();
            $table->dateTime('visit_date')->nullable();
            $table->string('visit_ip')->nullable();
            $table->string('visit_referer')->nullable();
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
        Schema::dropIfExists('link_statistics');
    }
}
