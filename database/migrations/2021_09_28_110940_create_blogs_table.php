<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('blog_category_id')
                ->constrained('blog_categories')
            ->onDelete('cascade');

            $table->string('thumbnail_image')->nullable();
            $table->string('content_image')->nullable();
            $table->unsignedTinyInteger('promoted')
                ->default(0);
            $table->unsignedTinyInteger('top_story')
                ->default(0);
            $table->mediumText('short_description')->nullable();
            $table->text('content')->nullable();
            $table->integer('visit_count')->default(0);

            $table->tinyInteger('status')
                ->default(1)
                ->comment('1=Active, 0=Deactive');
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
        Schema::dropIfExists('blogs');
    }
}
