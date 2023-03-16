<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_medias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_detail_id')->constrained('user_details', 'id');
            $table->string('link');
            $table->enum('type', ['facebook', 'instagram', 'twitter', 'linkedin']);
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
        Schema::dropIfExists('user_social_medias');
    }
}
