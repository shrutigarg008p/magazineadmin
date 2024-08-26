<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRssFeedMgt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_feed_mgt', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_category_id')
                ->constrained('blog_categories')
                ->onDelete('cascade');

            $table->text('url');

            $table->timestamp('last_synced')
                ->nullable();

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
        Schema::dropIfExists('rss_feed_mgt');
    }
}
