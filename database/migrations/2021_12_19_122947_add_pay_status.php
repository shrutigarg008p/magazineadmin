<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPayStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_blog_subscriptions', function (Blueprint $table) {
            $table->boolean('pay_status')
                ->default(0)
                ->after('purchased_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_blog_subscriptions', function (Blueprint $table) {
            //
        });
    }
}
