<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdsIosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            //
            $table->string('g_banner_ads_ios')->after('g_full_ads')->nullable();
            $table->string('g_medium_ads_ios')->after('g_banner_ads_ios')->nullable();
            $table->string('g_full_ads_ios')->after('g_medium_ads_ios')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            //
        });
    }
}
