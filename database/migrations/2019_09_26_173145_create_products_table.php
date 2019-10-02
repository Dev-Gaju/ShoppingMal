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
            $table->Increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('product_name');
            $table->float('product_price');
            $table->integer('product_quantity');
            $table->text('short_description');
            $table->text('full_description');
            $table->text('product_image');
            $table->tinyInteger('publication_status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->
            onUpdate('cascade')->onDelete('cascade');

           // $table->foreign('category_id')->references('id')->on('categories')->
               // onUpdate('cascade')->onDelete('cascade');
           // $table->foreign('brand_id')->references('id')->on('brands')->
           // onUpdate('cascade');


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
