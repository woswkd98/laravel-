<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateBidingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidings', function (Blueprint $table) {
            $table->bigIncrements('id'); // bigint
            $table->foreignIdFor(App\Models\Buyer::class, 'buyer_id');
            $table->foreignIdFor(App\Models\Seller::class, 'seller_id');
            $table->bigInteger('price');
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
        Schema::dropIfExists('bidings');
    }
}
