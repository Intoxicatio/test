<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->integer('barcode');
            $table->string('total_price');
            $table->string('discount_percent');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->string('promo_code_discount')->nullable();
            $table->string('warehouse_name');
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name');
            $table->integer('income_id');
            $table->string('sale_id');
            $table->string('odid')->nullable();
            $table->string('spp');
            $table->string('for_pay');
            $table->string('finished_price');
            $table->string('price_with_disc');
            $table->integer('nm_id');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->string('is_storno')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
