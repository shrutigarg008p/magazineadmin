<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationRestriction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_restriction', function (Blueprint $table) {
            $table->id();

            $table->foreignId('notif_template_id')
                ->constrained('notif_templates')
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->comment('magazine,newspaper,blog_category_id');

            $table->string('age_group', 50)
                ->nullable();

            $table->string('gender', 50)
                ->nullable();

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
        Schema::dropIfExists('notification_restriction');
    }
}
