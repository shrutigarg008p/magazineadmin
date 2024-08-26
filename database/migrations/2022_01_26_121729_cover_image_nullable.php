<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoverImageNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content_grid_view', function (Blueprint $table) {
            $table->string('cover_image', 191)
                ->nullable()
                ->change();

            $table->text('description')
                ->nullable()
                ->change();
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
