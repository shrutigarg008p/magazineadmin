<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewspapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newspapers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->decimal('price');
            $table->foreignId('user_id')
                ->comment('belongs to Vendor user:id')
                ->constrained('users')
            ->onDelete('cascade');

            $table->foreignId('category_id')
                ->constrained('categories');
            
            $table->foreignId('publication_id')
                ->constrained('publications');
            
            $table->string('copyright_owner')->nullable();
            $table->string('edition_number')->nullable();
            
            $table->unsignedTinyInteger('popular')
                ->default(0);
            $table->text('short_description');
            $table->text('description')->nullable();
            $table->string('thumbnail_image');
            $table->string('cover_image');
            $table->string('file')->nullable();

            $table->tinyInteger('status')
                ->default(1)
                ->comment('1=active, 0=Deactive');
            $table->date('published_date');
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
        Schema::dropIfExists('newspapers');
    }
}
