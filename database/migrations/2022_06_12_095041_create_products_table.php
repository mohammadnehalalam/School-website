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
            $table->id();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');
            $table->foreignId('subcategory_id')
                ->constrained('subcategories')
                ->onDelete('cascade');
            $table->string('name', 100);
            $table->unsignedInteger('rank')->nullable();
            $table->string('code', 100)->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->longText('description')->nullable();
            $table->text('image');
            $table->text('image_thumb');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
