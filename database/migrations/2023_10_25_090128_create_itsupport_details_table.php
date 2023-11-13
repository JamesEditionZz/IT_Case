<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itsupport_detail', function (Blueprint $table) {
            $table->id('IT_ID');
            $table->string('IT_date');
            $table->string('member_name');
            $table->string('IT_detail');
            $table->string('IT_other');
            $table->string('IT_change');
            $table->string('IT_namechange');
            $table->string('name_agency');
            $table->string('name_division');
            $table->string('IT_service');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itsupport_detail');
    }
};
