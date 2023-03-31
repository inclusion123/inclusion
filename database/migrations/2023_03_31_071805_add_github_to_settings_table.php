<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGithubToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('github')->nullable()->after('facebook');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->tinyInteger('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('github');
        });
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
