<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeForeignKeyConst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {

            try {
                $prefix = DB::getTablePrefix() ?? '';
                $table->dropForeign($prefix.'blogs_blog_category_id_foreign');
            } catch(\Exception $e) {}

            $table->foreign('blog_category_id')
                ->references('id')
                ->on('categories');
        });

        Schema::table('rss_feed_mgt', function (Blueprint $table) {
            try {
                $prefix = DB::getTablePrefix() ?? '';
                $table->dropForeign($prefix.'rss_feed_mgt_blog_category_id_foreign');
            } catch(\Exception $e) {}

            $table->foreign('blog_category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
}
