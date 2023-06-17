<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alter2WithdrawalCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdrawal_calculation', function (Blueprint $table) {
            $table->integer('target_amount')->nullable()->change();
            $table->integer('real_time_amount')->nullable()->change();
            $table->integer('remaining_withdrawal')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdrawal_calculation', function (Blueprint $table) {
            $table->integer('target_amount')->change();
            $table->integer('real_time_amount')->change();
            $table->integer('remaining_withdrawal')->change();
        });
    }
}
