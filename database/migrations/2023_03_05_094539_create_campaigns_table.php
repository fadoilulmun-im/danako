<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('campaign_categories')->onUpdate('cascade')->onDelete('set null');
            $table->string('name');
            $table->string('description');
            $table->float('amount');
            $table->string('img_path');
            $table->string('receiver');
            $table->string('purpose');
            $table->string('address_receiver');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('real_time_amount');
            $table->enum('verification_status', ['unverified', 'processing', 'rejected', 'verified'])->default('unverified');
            $table->enum('activity', ['processing', 'closed', 'sending', 'received'])->default('processing');
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
        Schema::dropIfExists('campaigns');
    }
}
