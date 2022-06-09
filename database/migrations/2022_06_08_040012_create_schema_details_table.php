<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schema_details', function (Blueprint $table) {
            $table->increments('id');
            $table->text('website_url');
            $table->integer('schema_id')->unsigned();
            $table->foreign('schema_id')->references('id')->on('schema_types')->onDelete('cascade');
            $table->tinyInteger('status')->comment('0 = Inactive, 1 = Active')->default('1');
            $table->text('response');
            $table->timestamps();
            $table->softDeletes(); // this will create deleted_at field for softdelete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schema_details');
    }
}
