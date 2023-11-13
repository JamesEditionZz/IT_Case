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
        Schema::create('data_detail', function (Blueprint $table) {
            $table->id('detail_ID');
            $table->string('code_ID')->unique();
            $table->string('date_item');
            $table->integer('category_ID');
            $table->integer('equipment_ID');
            $table->integer('brand_ID');
            $table->string('department');
            $table->string('section');
            $table->string('name_informer');
            $table->string('type');
            $table->string('other')->nullable();
            $table->string('tf_informer')->nullable();
            $table->string('tf_department')->nullable();
            $table->string('tf_section')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_detail');
    }
};
