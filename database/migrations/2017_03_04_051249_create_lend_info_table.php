<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend_info' , function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
//            物资名称
            $table->string('name');
//            所属单位
//            $table->string('belongs_to');
//            存放位置
//            $table->string('place');
//            当前状态
            $table->enum('status',array('已归还','未归还'))->default('未归还');
//            物资总数
//            $table->integer('total');
//            可借数目
//            $table->integer('available');
//            借出时间
            $table->timestamp('lend_time')->default(\Carbon\Carbon::now()->toDateTimeString());
//            借出数目
            $table->integer('lend_num');
//            借给的单位
            $table->string('lend_to');
//            联系电话
            $table->string('lend_contact', 11);
//            预计归还时间
            $table->date('should_return_time')->default(\Carbon\Carbon::now()->toDateString());
//            归还时间
            $table->date('returned_time')->default(\Carbon\Carbon::now()->addWeek(1)->toDateString());
//            经手人
            $table->string('lend_from');
//            经手人联系方式
            $table->string('lend_from_contact',11);
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
        Schema::dropIfExists('lend_info');
    }
}
