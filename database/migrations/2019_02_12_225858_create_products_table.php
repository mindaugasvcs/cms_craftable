<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->index('brand_id');
            $table->string('sku');
            $table->string('name');
            $table->decimal('msrp', 8, 2)->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('wholesale_price', 8, 2)->nullable();
            $table->boolean('discount_available')->default(false);
            $table->unsignedTinyInteger('discount')->nullable();
            $table->boolean('available')->default(true);
            $table->date('available_date')->nullable();
            $table->unsignedSmallInteger('units_in_stock')->default(0);
            $table->unsignedSmallInteger('units_on_order')->default(0);
            $table->unsignedSmallInteger('minimal_quantity')->default(1);
            // $table->enum('condition', ['new', 'used', 'refurbished'])->default('new');
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('depth', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->text('description');
            $table->text('images')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
}
