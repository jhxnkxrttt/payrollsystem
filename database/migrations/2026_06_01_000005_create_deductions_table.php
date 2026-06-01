<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->enum('type', ['SSS', 'Pag-IBIG', 'PhilHealth', 'Late', 'Absent', 'Other']);
            $table->decimal('amount', 10, 2);
            $table->string('description', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deductions');
    }
};
