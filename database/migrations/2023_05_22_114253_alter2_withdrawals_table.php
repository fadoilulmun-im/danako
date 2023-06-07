<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alter2WithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->enum('status', ['processing', 'approved', 'rejected'])->default('processing');
            $table->integer('amount')->change();
            $table->text('reject_note')->nullable()->after('status');
            $table->string('bank_name')->nullable()->after('reject_note');
            $table->string('rek_name')->nullable()->after('bank_name');
            $table->string('rek_number')->nullable()->after('rek_name');
            $table->integer('remaining_withdrawal')->nullable()->after('rek_number');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->dropColumn('reject_note');
            $table->dropColumn('bank_name');
            $table->dropColumn('rek_name');
            $table->dropColumn('rek_number');
        });
    }
}
