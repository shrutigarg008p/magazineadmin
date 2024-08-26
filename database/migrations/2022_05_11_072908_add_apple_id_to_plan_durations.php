<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;

class AddAppleIdToPlanDurations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // stupid solution; it doesn't convert to char
        if (!Type::hasType('char')) {
            Type::addType('char', StringType::class);
        }

        Schema::table('plan_durations', function (Blueprint $table) {

            $table->char('currency', 4)
                ->change();

            $table->string('apple_product_id', 191)
                ->nullable();

            $table->string('apple_family_product_id', 191)
                ->nullable();

            $table->unique(['currency', 'apple_product_id']);

            $table->unique(['currency', 'apple_family_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_durations', function (Blueprint $table) {
            //
        });
    }
}
