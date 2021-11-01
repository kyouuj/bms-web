<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id');
            $table->bigInteger('user_id');
            $table->timestamps();

            $table->index('user_id');
            $table->index('role_id');
        });

        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('library_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('library_id');
            $table->bigInteger('book_id');
            $table->smallInteger('quantity', false, true);
            $table->timestamps();

            $table->index(['library_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('libraries');
        Schema::dropIfExists('library_books');
    }
}
