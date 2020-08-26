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

            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

            // 담당자
            $table->unsignedBigInteger('assignee_id')->nullable();
            $table->foreign('assignee_id')
                ->references('id')
                ->on('users');

            $table->string('name', 50);
            $table->mediumText('desc')->nullable();

            $table->dateTime('due_date')->nullable();
            $table->boolean('is_reminder')->default(false);
            $table->dateTime('reminder_at')->nullable();

            $table->text('file')->nullable();

            $table->timestamps();
            $table->softDeletes();
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
