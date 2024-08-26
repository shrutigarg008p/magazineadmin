<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('ads_type')->nullable()->comment('either App or Web Ads');
            $table->string('preffered_type')->nullable()->comment('either Google or Custom Ads');
            $table->string('c_banner_ads')->nullable();
            $table->string('c_banner_ads_name')->nullable();
            $table->string('c_medium_ads')->nullable();
            $table->string('c_medium_ads_name')->nullable();
            $table->string('c_full_ads')->nullable();
            $table->string('c_full_ads_name')->nullable();
            $table->string('g_ads_id')->nullable();
            $table->string('g_banner_ads')->nullable();
            $table->string('g_medium_ads')->nullable();
            $table->string('g_full_ads')->nullable();
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
        Schema::dropIfExists('ads');
    }
}
