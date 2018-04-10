<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
            $table->string('category');
            $table->string('industry');
            $table->mediumText('description');
            $table->string('location');
            $table->integer('no_of_personnel');
            $table->integer('no_of_hours');
            $table->integer('pay_per_hr')->nullable();
            $table->enum('wallet_debit_frequency', ['hourly', 'daily']);
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
        Schema::dropIfExists('jobs');
    }
}
