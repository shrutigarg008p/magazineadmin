<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('title', 191);

            $table->string('key', 191)
                ->unique();

            $table->text('desc')
                ->nullable();

            $table->string('type', 191)
                ->comment('bundle,single,premium');

            $table->text('duration_json')
                ->comment('only for faster access. separate table: plan_durations')
                ->nullable();

            $table->timestamps();
        });

        Schema::create('plan_publications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plan_id')
                ->constrained('plans')
                ->onDelete('cascade');

            $table->foreignId('publication_id')
                ->constrained('publications')
                ->onDelete('cascade');
        });

        Schema::create('plan_durations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plan_id')
                ->constrained('plans')
                ->onDelete('cascade');

            $table->string('value', 191)
                ->comment('weekly,monthly,etc.');

            $table->string('code', 191)
                ->nullable()
                ->comment('w,m,etc.');

            $table->decimal('price');

            $table->unsignedSmallInteger('discount')
                ->nullable();
        });

        // users who purchased a plan
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('plan_id')
                ->constrained('plans')
                ->onDelete('cascade');

            $table->timestamp('subscribed_at')
                ->nullable();

            $table->timestamp('expires_at')
                ->nullable();

            // at what price this user bought this plan
            $table->decimal('purchased_at');

            $table->boolean('is_family')
                ->comment('can have more than one associated users')
                ->default(0);

            $table->string('refferal_code', 191)
                ->unique()
                ->nullable();

            $table->timestamps();
        });

        // extra members associated with a particular purchased
        // subscription
        Schema::create('user_subscription_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_subscription_id')
                ->constrained('user_subscriptions')
                ->onDelete('cascade');

            $table->foreignId('member_id')
                ->constrained('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::dropIfExists('user_subscription_members');
        Schema::dropIfExists('user_subscriptions');
        Schema::dropIfExists('plan_durations');
        Schema::dropIfExists('plan_publications');
        Schema::dropIfExists('plans');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
