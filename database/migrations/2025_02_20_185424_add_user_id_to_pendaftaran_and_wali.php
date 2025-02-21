<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->foreignId('user_id')->after('status_id')->constrained('users')->onDelete('cascade')->unique();
        });

        Schema::table('wali', function (Blueprint $table) {
            $table->foreignId('user_id')->after('email')->constrained('users')->onDelete('cascade')->unique();
        });
    }

    public function down()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('wali', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
