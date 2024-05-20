<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->string('adresse')->nullable()->after('email');
            $table->string('phone')->nullable()->after('adresse');
            $table->string('sexe')->nullable()->after('phone');
            $table->string('country')->nullable()->after('sexe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropColumn(['adresse', 'phone', 'sexe', 'country']);
        });
    }
};
