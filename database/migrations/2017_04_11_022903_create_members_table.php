<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->mediumInteger('user_id')->unsigned();
            $table->string('member_fname');
            $table->string('member_lname');
            $table->string('member_addr')->nullable();
            $table->date('member_dbirth')->nullable();
            $table->char('member_gender',1)->nullable();
            $table->timestamps();

            //set primary key
            $table->primary('user_id');
            //set foreign key
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
