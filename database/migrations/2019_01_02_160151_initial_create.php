<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poslodavac', function (Blueprint $table) {
            $table->char('JMBG', 13)->primary();
            $table->string('ime', 20)->nullable($value = false);
            $table->string('prezime', 30)->nullable($value = false);
            $table->integer('godine', false, 3)->nullable($value = false);
        });

        Schema::create('radnik', function (Blueprint $table) {
            $table->char('JMBG', 13)->primary();
            $table->string('ime', 20)->nullable($value = false);
            $table->string('prezime', 30)->nullable($value = false);
            $table->integer('godine', false, 3)->nullable($value = false);
            $table->date('datum_zaposlenja')->nullable($value = false);
            $table->string('naziv_radnog_mesta', 30);
            $table->string('JMBG_poslodavca', 13);
            
            $table->foreign('naziv_radnog_mesta')->references('naziv')->on('radno_mesto');
            $table->foreign('JMBG_poslodavca')->references('JMBG')->on('poslodavac');
        });

        Schema::create('radno_mesto', function (Blueprint $table) {
            $table->string('naziv', 30)->primary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
