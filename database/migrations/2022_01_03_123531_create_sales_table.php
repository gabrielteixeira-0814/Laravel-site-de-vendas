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
            $table->increments('id');
            $table->integer('quantity');
            $table->date('dateSale');
            $table->decimal('discount', 8, 2);
            $table->decimal('valueSale', 8, 2);
            $table->integer('idUser')->unsigned();
            $table->integer('idProduct')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idProduct')->references('id')->on('products');
            $table->boolean('status_sales');
            $table->boolean('status');
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
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('lists_user_id_foreign');
            $table->dropForeign('lists_product_id_foreign');
        });
        Schema::dropIfExists('sales');
    }
}
