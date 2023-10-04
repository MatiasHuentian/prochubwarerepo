<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProposalsUpgradesStatesTable extends Migration
{
    public function up()
    {
        Schema::table('proposals_upgrades_states', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9072438')->references('id')->on('users');
        });
    }
}
