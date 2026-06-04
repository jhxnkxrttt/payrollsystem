<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('payroll')) {
            return;
        }

        Schema::table('payroll', function (Blueprint $table) {
            if (! Schema::hasColumn('payroll', 'paid_date')) {
                $table->date('paid_date')->nullable()->after('employee_id');
            }

            if (! Schema::hasColumn('payroll', 'present_days')) {
                $table->unsignedTinyInteger('present_days')->default(0)->after('cut_off_end');
            }

            if (! Schema::hasColumn('payroll', 'absent_days')) {
                $table->unsignedTinyInteger('absent_days')->default(0)->after('present_days');
            }

            if (! Schema::hasColumn('payroll', 'late_days')) {
                $table->unsignedTinyInteger('late_days')->default(0)->after('absent_days');
            }

            if (! Schema::hasColumn('payroll', 'late_deduction')) {
                $table->decimal('late_deduction', 10, 2)->default(0)->after('gross_pay');
            }

            if (! Schema::hasColumn('payroll', 'selected_deductions')) {
                $table->text('selected_deductions')->nullable()->after('late_deduction');
            }
        });
    }

    public function down(): void
    {
        //
    }
};
