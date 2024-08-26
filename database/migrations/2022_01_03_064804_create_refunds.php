<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefunds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();

            $table->string('for', 191)
                ->comment('plan_subscription,blog_subscription,direct_purchase');

            $table->foreignId('entity_id')
                ->comment('id of plan_subscription,blog_subscription,direct_purchased magazine,newspaper');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->decimal('paid_amount')
                ->nullable();

            $table->decimal('refund_amount');

            $table->text('customer_reason')
                ->nullable();

            $table->text('admin_reason')
                ->nullable();

            $table->string('processed_via')
                ->comment('payment gateway, or manually')
                ->nullable();

            $table->string('remote_ref', 191)
                ->nullable();

            $table->string('status', 191)
                ->nullable();

            $table->timestamps();
        });

        Schema::table('payments', function(Blueprint $table) {
            $table->foreignId('refund_id')
                ->nullable()
                ->after('id')
                ->constrained('refunds')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
