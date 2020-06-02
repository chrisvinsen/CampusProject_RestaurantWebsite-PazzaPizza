<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('total_product')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('product_category')->insert([
            ['name' => 'Appetizer', 'total_product' => 0, 'created_at' => '2020-06-01 22:06:33'],
            ['name' => 'Drink', 'total_product' => 0, 'created_at' => '2020-06-01 22:06:33'],
            ['name' => 'Pasta', 'total_product' => 0, 'created_at' => '2020-06-01 22:06:33'],
            ['name' => 'Pizza', 'total_product' => 0, 'created_at' => '2020-06-01 22:06:33'],
            ['name' => 'Rice', 'total_product' => 0, 'created_at' => '2020-06-01 22:06:33'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
