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
        Schema::create('lot', function (Blueprint $table) {
            $table->integer('lot_id', true, true);
            $table->dateTime('created');
            $table->integer('createdby');
            $table->dateTime('updated')->nullable();
            $table->integer('updatedby')->nullable();
            $table->enum('isactive', ['Y', 'N']);
            $table->string('name',100);
            $table->dateTime('production_date');
            $table->dateTime('analysis_date')->nullable();
            $table->unsignedInteger('product_id');
            $table->primary("lot_id");
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete("restrict")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quality_lot');
    }
};
