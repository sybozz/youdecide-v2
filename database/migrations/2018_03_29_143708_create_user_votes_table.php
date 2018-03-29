<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_votes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('proposal_id');
          $table->boolean('vote');
          $table->timestamp('created_at')->useCurrent();
          $table->timestamp('updated_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_votes');
    }
}
