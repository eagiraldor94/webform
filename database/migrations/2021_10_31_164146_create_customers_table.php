<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('user');
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->string('job');
            $table->string('phone');
            $table->string('mobile');
            $table->string('type');
            $table->boolean('webstore_auth')->default(false);
            $table->boolean('order_auth')->default(false);
            $table->boolean('password_send')->default(false);
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
        Schema::dropIfExists('customers');
    }
}
