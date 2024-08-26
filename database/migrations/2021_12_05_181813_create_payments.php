<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('currency', 20);

            $table->decimal('amount', 10, 2);

            $table->string('payment_method', 100)
                ->comment('stripe, paypal, paystack etc.');

            $table->string('status', 100)
                ->default('PENDING')
                ->comment('INITIATED,PENDING,FAILED,SUCCESS');

            $table->text('local_ref_id')
                ->comment('local reference uuid');

            $table->text('remote_id')
                ->nullable()
                ->comment('unique id from payment processor like stripe');

            $table->text('remote_response_raw')
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->timestamp('paid_at')
                ->nullable();

            $table->text('ip_addresses')
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
        Schema::dropIfExists('payments');
    }
}
