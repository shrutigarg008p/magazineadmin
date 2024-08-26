<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppleIdMagazineNewspaper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->string('apple_product_id', 191)
                ->after('status')
                ->nullable();
        });

        Schema::table('newspapers', function (Blueprint $table) {
            $table->string('apple_product_id', 191)
                ->after('status')
                ->nullable();
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
