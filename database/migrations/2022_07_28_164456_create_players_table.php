<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');

            $table->string('second_name');

            $table->string('form')->nullable();

            $table->string('total_points')->nullable();

            $table->string('influence')->nullable();

            $table->string('creativity')->nullable();

            $table->string('threat')->nullable();

            $table->uuid('ict_index')->nullable();

            $table->timestamp('edited_at')->nullable();

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
        Schema::dropIfExists('players');
    }
}
