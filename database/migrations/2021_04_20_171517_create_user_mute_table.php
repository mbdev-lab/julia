<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mute', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muter_user_id')->constrained('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('muted_user_id');
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
        Schema::dropIfExists('user_mute');
    }
}
