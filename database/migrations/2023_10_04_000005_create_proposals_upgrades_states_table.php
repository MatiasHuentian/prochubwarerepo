<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsUpgradesStatesTable extends Migration
{
    public function up()
    {
        Schema::create('proposals_upgrades_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prueba_1')->nullable();
            $table->longText('probando_el_textarea');
            $table->date('fecha_inicio');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
