<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddCouponCodeAndDiscountToOrdersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('coupon_code')->nullable()->after('total_price');
                $table->decimal('discount', 8, 2)->default(0)->after('coupon_code');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('coupon_code');
                $table->dropColumn('discount');
            });
        }
    }

?>
