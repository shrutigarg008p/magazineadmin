<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilePreview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->string('file_preview', 191)
                ->nullable()
                ->after('file_type');
        });

        Schema::table('newspapers', function (Blueprint $table) {
            $table->string('file_preview', 191)
                ->nullable()
                ->after('file_type');
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
