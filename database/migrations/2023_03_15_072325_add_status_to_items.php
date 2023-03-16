<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->text('highlight_details')->nullable()->change();
            $table->text('discription')->nullable();
            $table->text('included')->nullable();
            $table->text('features')->nullable();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('highlight_details')->nullable()->change();
            $table->dropColumn('discription');
            $table->dropColumn('included');
            $table->dropColumn('features');
            $table->dropColumn('status');
        });
    }
}
