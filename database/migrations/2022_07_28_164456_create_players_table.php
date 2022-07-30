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

            $table->float('form', 4, 2)->nullable();

            $table->integer('total_points')->nullable();

            $table->float('influence', 4, 2)->nullable();

            $table->float('creativity', 4, 2)->nullable();

            $table->float('threat', 4, 2)->nullable();

            $table->float('ict_index', 5, 2)->nullable();

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
