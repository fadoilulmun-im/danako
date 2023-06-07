<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alter2DonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->integer('transaction_fee')->after('amount_donations');
            $table->integer('platform_fee')->after('transaction_fee');
            $table->integer('net_amount')->after('platform_fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('transaction_fee');
            $table->dropColumn('platform_fee');
            $table->dropColumn('net_amount');
        });
    }
}
