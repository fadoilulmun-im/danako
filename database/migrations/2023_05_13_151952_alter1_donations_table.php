<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alter1DonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('external_id')->nullable()->unique()->change();
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->integer('amount_donations')->change();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
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
            $table->string('external_id')->nullable()->change();
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->float('amount_donations')->change();

            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('phone_number');
        });
    }
}
