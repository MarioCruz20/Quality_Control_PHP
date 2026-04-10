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
        Schema::create('batch_analysis_state', function (Blueprint $table) {
            $table->integer('batch_analysis_state_id', true, true);
            $table->dateTime('created');
            $table->integer('createdby');
            $table->dateTime('updated')->nullable();
            $table->integer('updatedby')->nullable();
            $table->enum('isactive', ['Y', 'N']);
            $table->string('name',100);
            $table->dateTime('datefrom');
            $table->dateTime('dateto')->nullable();
            $table->decimal('datediif',8,2)->nullable();
            $table->unsignedInteger('batch_analysis_id');
            $table->primary("batch_analysis_state_id");
            $table->foreign('batch_analysis_id')->references('batch_analysis_id')->on('batch_analysis')->onDelete("restrict")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_analysis_state');
    }
};
