<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('tax_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('sub_cat_id')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('qty')->nullable();
            $table->string('mrp')->nullable();
            $table->string('price')->nullable();
            $table->string('stock_warning')->nullable();
            $table->tinyInteger('is_return')->default(0);
            $table->tinyInteger('best_selling')->default(0);
            $table->tinyInteger('sale')->default(0);
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
        Schema::dropIfExists('products');
    }
};
