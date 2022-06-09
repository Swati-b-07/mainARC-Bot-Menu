<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schema_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('schema_name', 255);
            $table->tinyInteger('status')->comment('0 = Inactive, 1 = Active')->default('1');
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
        Schema::dropIfExists('schema_types');
    }
}
