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
        Schema::create('t_sales', function (Blueprint $table) {
            $table->id("sales_id");
            $table->string("kode", 15);
            $table->date("tgl");
            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")->references("customer_id")->on("m_customer");
            $table->decimal("subtotal", 10, 2);
            $table->decimal("diskon", 10, 2);
            $table->decimal("ongkir", 10, 2);
            $table->decimal("total_bayar", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_sales');
    }
};
