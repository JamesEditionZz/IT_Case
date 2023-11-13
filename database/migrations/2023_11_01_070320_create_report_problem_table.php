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
        Schema::create('report_problem', function (Blueprint $table) {
            $table->id('ID');
            $table->string('RP_date');
            $table->string('RP_name');
            $table->string('RP_department');
            $table->string('RP_section');
            $table->string('RP_tel');
            $table->string('RP_other');
            $table->string('RP_member');
            $table->integer('RP_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_problems');
    }
};
