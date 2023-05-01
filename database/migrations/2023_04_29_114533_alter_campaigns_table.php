<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('img_path')->nullable(false)->change();
            $table->text('reject_note')->nullable()->after('activity');
            $table->text('description')->change();
            $table->text('purpose')->change();
            $table->text('detail_usage_of_funds')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('img_path')->nullable(false)->change();
            $table->dropColumn('reject_note');
            $table->text('description')->change();
            $table->text('purpose')->change();
            $table->text('detail_usage_of_funds')->change();
        });
    }
}
