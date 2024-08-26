<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_registration_id')
                ->unique();
            $table->tinyInteger('frequeny_of_uploads');
            $table->text('magazine_upload_description');
            $table->tinyInteger('is_verified')
                ->nullable()
                ->comment('1=approved, 0=denied');
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
        Schema::dropIfExists('vendor_info');
    }
}
