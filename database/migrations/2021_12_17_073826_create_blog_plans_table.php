<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_plans', function (Blueprint $table) {
            $table->id();

            $table->string('title', 191);

            $table->text('desc')
                ->nullable();

            $table->boolean('status')
                ->default(1);

            $table->unsignedTinyInteger('display_order')
                ->default(0);

            $table->timestamps();
        });

        Schema::create('blog_plan_durations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_plan_id')
                ->constrained('blog_plans')
                ->onDelete('cascade');

            $table->string('value', 191);

            $table->string('code', 10);

            $table->decimal('price');

            $table->string('currency', 10)
                ->default('GHS');

            $table->unsignedSmallInteger('discount')
                ->default(0);

            $table->timestamps();
        });

        Schema::create('user_blog_subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('blog_plan_id')
                ->constrained('blog_plans')
                ->onDelete('cascade');

            $table->foreignId('blog_plan_duration_id')
                ->constrained('blog_plan_durations')
                ->onDelete('cascade');

            $table->foreignId('payment_id')
                ->constrained('payments')
                ->onDelete('cascade');

            $table->timestamp('subscribed_at')
                ->nullable();

            $table->timestamp('expires_at')
                ->nullable();

            // at what price this user bought this plan
            $table->decimal('purchased_at');

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
        Schema::dropIfExists('blog_plans');
    }
}
