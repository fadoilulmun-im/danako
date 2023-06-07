<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_calculation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdrawal_id')->nullable()->constrained('withdrawals')->onUpdate('cascade')->onDelete('set null');
            $table->integer('remaining_withdrawal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawal_calculation');
    }
}
