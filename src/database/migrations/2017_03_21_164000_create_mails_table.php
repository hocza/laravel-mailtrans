<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailtrans_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sender_name');
            $table->string('sender_email');
            $table->string('subject');
            $table->text('subject_trans')->nullable();
            $table->text('body');
            $table->text('body_trans')->nullable();
            $table->string('view_name')->default('mailtrans.default');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
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
        Schema::drop('mailtrans_mails');
    }
}
