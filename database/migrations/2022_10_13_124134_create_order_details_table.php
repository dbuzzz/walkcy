<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('prod_id')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('variation')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('tax')->nullable();
            $table->string('shipping')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('total_amount')->nullable();
            $table->tinyInteger('active_status')->default(1);
            $table->tinyInteger('is_deleted')->default(0);
            $table->integer('added_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('NULL on update CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
