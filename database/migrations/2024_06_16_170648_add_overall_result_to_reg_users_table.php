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
        Schema::table('reg_users', function (Blueprint $table) {
            $table->decimal('scr', 8, 2)->default(0);
            $table->decimal('learning_obj', 8, 2)->default(0);
            $table->boolean('payment_status')->default(false);
            $table->integer('trial_days')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reg_users', function (Blueprint $table) {
            $table->dropColumn('scr');
            $table->dropColumn('learning_obj');
            $table->dropColumn('payment_status');
            $table->dropColumn('trial_days');

        });
    }
};
