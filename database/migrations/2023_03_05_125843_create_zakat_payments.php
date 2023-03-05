<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakatPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakat_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zakat_id');
            $table->fload('amounts');
            $table->date('time');
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zakat_payments');
    }
}
