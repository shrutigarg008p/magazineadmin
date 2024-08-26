<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_onetime_purchases', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('payment_id')
                ->constrained('payments')
                ->onDelete('cascade');

            $table->foreignId('package_id');

            $table->string('package_type', 100)
                ->comment('magazine,newspaper');

            $table->boolean('pay_status')
                ->default(0);

            $table->decimal('price')
                ->nullable();

            $table->timestamp('bought_at')
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
        Schema::dropIfExists('user_purchases');
    }
}
