<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDownloadTelly extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('download_date')
                ->nullable()
                ->after('vendor_verified');

            $table->unsignedSmallInteger('download_counter')
                ->default(0)
                ->after('download_date');
        });

        Schema::create('user_downloads', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('file_type', 191)
                ->comment('magazine,news');

            $table->foreignId('file_id');

            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });

        Schema::dropIfExists('user_downloads');
    }
}
