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
        Schema::create('batch_analysis_line', function (Blueprint $table) {
            $table->integer('batch_analysis_line_id',true,true);
            $table->dateTime('created');
            $table->integer('createdby');
            $table->dateTime('updated')->nullable();
            $table->integer('updatedby')->nullable();
            $table->enum('isactive', ['Y', 'N']);
            $table->decimal('moisture', 8, 2);
            $table->decimal('temperature', 8, 2);
            $table->decimal('sodium', 8, 2);
            $table->decimal('protein', 8, 2);
            $table->integer('number_batch');
            $table->unsignedInteger('batch_analysis_id');
            $table->foreign('batch_analysis_id')->references('batch_analysis_id')->on('batch_analysis')->onDelete("restrict")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_analysis_line');
    }
};
