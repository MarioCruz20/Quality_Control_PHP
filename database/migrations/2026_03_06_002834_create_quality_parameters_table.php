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
        Schema::create('quality_parameters', function (Blueprint $table) {
            $table->integer('quality_parameter_id', true, true);
            $table->dateTime('created')->nullable(false);
            $table->integer('createdby')->nullable(false);
            $table->dateTime('updated')->nullable();
            $table->integer('updatedby')->nullable();
            $table->enum('isactive', ['Y', 'N'])->nullable(false);
            $table->decimal('min_moisture', 8, 2)->nullable(false);
            $table->decimal('max_moisture', 8, 2)->nullable(false);
            $table->decimal('min_temperature', 8, 2)->nullable(false);
            $table->decimal('max_temperature', 8, 2)->nullable(false);
            $table->decimal('min_sodium', 8, 2)->nullable(false);
            $table->decimal('max_sodium', 8, 2)->nullable(false);
            $table->decimal('min_protein', 8, 2)->nullable(false);
            $table->decimal('max_protein', 8, 2)->nullable(false);
            $table->primary("quality_parameter_id");
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete("restrict")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quality_parameters');
    }
};
