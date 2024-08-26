<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IsFree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->boolean('is_free')
                ->after('user_id')
                ->default(0);
        });

        Schema::table('newspapers', function (Blueprint $table) {
            $table->boolean('is_free')
                ->after('user_id')
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('magazines', function (Blueprint $table) {
            //
        });
    }
}
