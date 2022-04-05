<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_covids', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->date('sampling_date');
            $table->time('time_of_test');
            $table->string('checkpoint')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('test_covids');
    }
}
