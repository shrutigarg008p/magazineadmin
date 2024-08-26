<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAdsTableForUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('banner_ads_url')->nullable()->after('g_full_ads');
            $table->string('medium_ads_url')->nullable()->after('g_full_ads');
            $table->string('full_ads_url')->nullable()->after('g_full_ads');
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
            $table->dropColumn(['banner_ads_url','medium_ads_url','full_ads_url']);
        });
    }
}
