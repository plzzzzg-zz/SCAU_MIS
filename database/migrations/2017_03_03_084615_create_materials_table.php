<?php

//use Schema;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
//            物资名称
            $table->string('name');
//            所属单位
            $table->string('belongs_to')->default('数信软团学');
//            存放位置
            $table->string('place');
//            当前状态
            $table->enum('status',array('empty','available','broken'))->default('available');
//            物资总数
            $table->integer('total');
//            可借数目
            $table->integer('available');
//            借出数目
            $table->integer('lend_num')->default(0);
//            备注
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
