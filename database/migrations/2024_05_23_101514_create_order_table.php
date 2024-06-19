<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateOrderTable extends Migration
    {
        public function up()
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->decimal('total_price', 10, 2);
                $table->string('status')->default('pending');
                $table->timestamps();
            });

            Schema::create('order_product', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->integer('quantity');
                $table->decimal('price', 10, 2);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('order_product');
            Schema::dropIfExists('orders');
        }
    }
?>
