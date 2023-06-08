<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterWithdrawalCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdrawal_calculation', function (Blueprint $table) {
            $table->integer('target_amount');
            $table->integer('real_time_amount');
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
            $table->dropColumn('target_amount');
            $table->dropColumn('real_time_amount');
        });
    }
}
