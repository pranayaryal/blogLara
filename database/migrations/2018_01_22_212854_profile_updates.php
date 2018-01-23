<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
          $table->dropIndex('profiles_user_id_unique');
          $table->dropColumn('user_id');
          $table->string('first_name');
          $table->string('last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->integer('user_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
}
