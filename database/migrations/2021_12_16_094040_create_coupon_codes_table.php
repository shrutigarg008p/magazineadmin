<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');
            $table->string('code',10);
            $table->tinyInteger('type')->default(1)->comment('1=>percent, 2=>amount');
            $table->tinyInteger('status')->default(0)->comment('0=>pendingm, 1=>expired');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('discount')->default(0);
            $table->tinyInteger('used_times')->default(1);
            $table->tinyInteger('valid_for')->default(5);
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
        Schema::dropIfExists('coupon_codes');
    }
}
