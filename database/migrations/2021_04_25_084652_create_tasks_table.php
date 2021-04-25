<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('employee_id');
            $table->float('expected_completion_time');
            $table->float('actual_completion_time');
            $table->float('expected_output');
            $table->float('actual_output');
            $table->integer('importance');
            $table->float('cost');
            $table->integer('supervisor');
            $table->dateTime('assigned_date');
            $table->float('task_expiry');
            $table->dateTime('started_date');
            $table->dateTime('completed_date');
            $table->text('comments');
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
        Schema::dropIfExists('tasks');
    }
}
