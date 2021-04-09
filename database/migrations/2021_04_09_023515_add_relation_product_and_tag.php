<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationProductAndTag extends Migration
{

    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('tag_id');
        });
    }


    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
}
