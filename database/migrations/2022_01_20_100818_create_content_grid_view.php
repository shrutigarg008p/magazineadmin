<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentGridView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_grid_view', function (Blueprint $table) {
            $table->id();

            $table->string('content_type', 191)
                ->comment('magazine,newspaper');

            $table->foreignId('content_id');

            $table->string('thumbnail_image')
                ->nullable();

            $table->string('cover_image');

            $table->string('title', 191)
                ->nullable();

            $table->text('short_description')
                ->nullable();

            $table->text('description');

            $table->unsignedSmallInteger('crossAxisCount')
                ->default(0);

            $table->unsignedSmallInteger('mainAxisCount')
                ->default(0);

            $table->unsignedSmallInteger('order')
                ->default(1);

            $table->unsignedSmallInteger('slider_page_no')
                ->comment('slider_page_no')
                ->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_grid_view');
    }
}
