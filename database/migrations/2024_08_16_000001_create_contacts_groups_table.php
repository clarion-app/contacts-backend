<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contacts_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->enum('group_type', ['friend', 'business']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts_groups');
    }
};