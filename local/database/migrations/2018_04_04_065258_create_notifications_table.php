<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('notifications_type',300);
			$table->string('notifications_message',300);
			$table->string('user_id');
			$table->string('job_id',50)->nullable();
			$table->string('notification_by_user_id',50);
			$table->string('is_read',50)->default(0);
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
        Schema::dropIfExists('notifications');
    }
}
