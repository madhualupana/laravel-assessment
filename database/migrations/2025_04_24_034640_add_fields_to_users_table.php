<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('email');
            $table->string('prefixname')->nullable()->after('id');
            $table->string('firstname')->after('prefixname');
            $table->string('middlename')->nullable()->after('firstname');
            $table->string('lastname')->after('middlename');
            $table->string('suffixname')->nullable()->after('lastname');
            $table->string('photo')->nullable()->after('suffixname');
            $table->string('type')->default('user')->after('photo');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'prefixname',
                'firstname',
                'middlename',
                'lastname',
                'suffixname',
                'photo',
                'type'
            ]);
        });
    }
};