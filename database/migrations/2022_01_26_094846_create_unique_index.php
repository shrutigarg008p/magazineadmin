<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUniqueIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content_grid_view', function (Blueprint $table) {

            DB::table('content_grid_view')->truncate();

            $table->unique([
                'content_id', 'content_type',
                'crossAxisCount', 'mainAxisCount',
                'order', 'slider_page_no'
            ], 'grid_unique_key_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_grid_view', function (Blueprint $table) {
            //
        });
    }
}
