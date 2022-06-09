<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemaFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schema_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name', 255);
            $table->integer('field_related_to')->unsigned();
            $table->foreign('field_related_to')->references('id')->on('schema_types')->onDelete('cascade');
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('status')->comment('0 = Inactive, 1 = Active')->default('1');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schema_fields');
    }
}
