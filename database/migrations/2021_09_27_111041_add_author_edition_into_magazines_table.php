<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorEditionIntoMagazinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->string('edition_number')->nullable()
                ->after('publication_id');
            $table->string('copyright_owner')->nullable()
                ->after('publication_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->dropColumn(['copyright_author', 'edition_number']);
        });
    }
}
