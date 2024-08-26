<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeGenderRestriction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notif_templates', function (Blueprint $table) {
            $table->string('age_group', 50)
                ->default('all')
                ->after('left_small_icon');

            $table->string('gender', 50)
                ->default('all')
                ->after('age_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notif_templates', function (Blueprint $table) {
            //
        });
    }
}
