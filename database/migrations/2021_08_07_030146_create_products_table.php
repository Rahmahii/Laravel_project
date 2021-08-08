<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('SKU')->nullable();
            $table->decimal('height');
            $table->decimal('width');
            $table->decimal('weight');
            $table->decimal('depth');
            $table->decimal('price');
            $table->unsignedBigInteger('user_id');
            $table->Integer('category_id')->nullable()->unsigned()->index();
            $table->Integer('currency_id')->nullable()->unsigned()->index();
            $table->Integer('mass_id')->nullable()->unsigned()->index();
            $table->Integer('distance_id')->nullable()->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade'); 
            $table->foreign('mass_id')->references('id')->on('masses')->onDelete('cascade'); 
            $table->foreign('distance_id')->references('id')->on('distances')->onDelete('cascade'); 
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
