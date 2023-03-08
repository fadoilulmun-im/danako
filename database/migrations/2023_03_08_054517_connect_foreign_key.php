<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zakats', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('zakat_categories')->nullOnDelete();
        });

        Schema::table('zakat_payments', function (Blueprint $table) {
            $table->foreign('zakat_id')->references('id')->on('zakats')->nullOnDelete();
        });

        Schema::table('waqfs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });

        Schema::table('waqf_payments', function (Blueprint $table) {
            $table->foreign('waqf_id')->references('id')->on('waqfs')->nullOnDelete();
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zakats', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
        });

        Schema::table('zakat_payments', function (Blueprint $table) {
            $table->dropForeign(['zakat_id']);
        });

        Schema::table('waqfs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('waqf_payments', function (Blueprint $table) {
            $table->dropForeign(['waqf_id']);
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
