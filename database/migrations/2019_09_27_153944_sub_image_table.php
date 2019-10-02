<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_image',function (Blueprint $table){
              $table->Increments('id');
              $table->unsignedInteger('product_id');
              $table->text('sub_image');
              $table->timestamps();
              $table->foreign('product_id')->references('id')->on('products')->
              onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
