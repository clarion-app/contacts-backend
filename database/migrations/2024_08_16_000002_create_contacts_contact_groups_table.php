<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contacts_contact_groups', function (Blueprint $table) {
            $table->uuid('contact_id');
            $table->uuid('group_id');

            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('contacts_groups')->onDelete('cascade');

            $table->primary(['contact_id', 'group_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts_contact_groups');
    }
};