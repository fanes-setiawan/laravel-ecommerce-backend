<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->setring('phone')->nullable()->after('password');
            $table->setring('address')->nullable()->after('phone');
            $table->setring('country')->nullable()->after('address');
            $table->setring('province')->nullable()->after('country');
            $table->setring('city')->nullable()->after('province');
            $table->setring('district')->nullable()->after('city');
            $table->setring('postal_code')->nullable()->after('distict');
            $table->setring('roles')->nullable()->after('postal_code');
            $table->setring('photo')->nullable()->after('roles');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address'); 
            $table->dropColumn('country');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('postal_code');
            $table->dropColumn('roles');
            $table->dropColumn('photo');
        });
    }
};
