<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileConverted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->string('file_converted', 191)
                ->nullable()
                ->after('file');
        });

        Schema::table('newspapers', function (Blueprint $table) {
            $table->string('file_converted', 191)
                ->nullable()
                ->after('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gcgl_magazines', function (Blueprint $table) {
            //
        });
    }
}
