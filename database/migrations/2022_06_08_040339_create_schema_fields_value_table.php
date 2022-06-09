<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemaFieldsValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schema_fields_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schema_details_id')->unsigned();
            $table->foreign('schema_details_id')->references('id')->on('schema_details')->onDelete('cascade');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('schema_fields')->onDelete('cascade');
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('status')->comment('0 = Inactive, 1 = Active')->default('1');
            $table->string('value', 255);
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
        Schema::dropIfExists('schema_fields_value');
    }
}
