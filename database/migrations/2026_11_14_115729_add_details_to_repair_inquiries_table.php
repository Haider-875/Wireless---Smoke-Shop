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
        Schema::table('repair_inquiries', function (Blueprint $table) {
            $table->string('email')->nullable()->after('phone');
            $table->string('inquiry_type')->default('general_inquiry')->after('service_needed');
            $table->unsignedBigInteger('product_id')->nullable()->after('inquiry_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repair_inquiries', function (Blueprint $table) {
            $table->dropColumn(['email', 'inquiry_type', 'product_id']);
        });
    }
};
