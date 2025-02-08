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
        Schema::create('t_sales_det', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sales_id");
            $table->unsignedBigInteger("barang_id");
            $table->foreign("sales_id")->references("sales_id")->on("t_sales");
            $table->foreign("barang_id")->references("barang_id")->on("m_barang");
            $table->integer("qty");
            $table->decimal("diskon_pct", 10, 2);
            $table->decimal("diskon_nilai", 10, 2)->nullable();
            $table->decimal("harga_diskon", 10, 2);
            $table->decimal("harga_badrol", 10, 2);
            $table->decimal("total", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_sales_det');
    }
};
