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
        Schema::create('subscription_change_requests', function (Blueprint $table) {
 $table->id();

            // العلاقة مع جدول ClientPricing
            $table->unsignedBigInteger('client_pricing_id');
            $table->foreign('client_pricing_id')
                  ->references('id')
                  ->on('client_pricings')
                  ->onDelete('cascade');

            // العلاقة مع جدول pricings (للباقة الجديدة)
            $table->unsignedBigInteger('new_pricing_id')->nullable();
            $table->foreign('new_pricing_id')
                  ->references('id')
                  ->on('pricings')
                  ->onDelete('set null');
            $table->string('payment_methodes');
            $table->string('pricing_way');
            // نوع الإجراء (تجديد/ترقية/تخفيض)
            $table->enum('action_type', ['renew', 'upgrade']);

            // حالة الطلب
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            // تاريخ الطلب
            $table->timestamp('requested_at')->useCurrent();

            $table->timestamps();

            // فهارس لتحسين الأداء
            $table->index('status');
            $table->index('client_pricing_id');
            $table->index('new_pricing_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_change_requests');
    }
};
