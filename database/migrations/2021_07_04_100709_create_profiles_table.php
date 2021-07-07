<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("firstName",255);
            $table->string("lastName",255);
            $table->string("phonePrimary",20);
            $table->string("addressLineOne",255);
            $table->string("addressLineTwo",255);
            $table->enum("sex",['male', 'female']);
            $table->string("phoneSecondary",20);
            $table->foreignId("user_id");
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
        Schema::dropIfExists('profiles');
    }
}
