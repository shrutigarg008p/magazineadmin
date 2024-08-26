<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddLayoutToGrid extends Migration
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

            $table->string('layout', 100)
                ->after('slider_page_no');
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
