<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTypesTable extends Migration
{
    public function up()
    {
        Schema::create('attachments_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
