<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBuyDomain extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_buy_domain', function(Blueprint $table)
                {
            
        	$table->increments('id');
        	$table->string('pur_title',200);//求购域名名称
                $table->string("domainsuffix",50)->comment('域名后缀'); 
        	$table->string('chars',60); //求购域名字符数
        	$table->integer('user_id');  //用户id
        	$table->string('level',15)->nullable();//用户等级
        	$table->string('trading',60)->comment('交易类型'); //交易类型
        	$table->string('type',60)->comment('著作权类别'); //著作权类别
        	$table->decimal('pur_price', 6, 2)->nullable(); //预购价格
        	$table->date('pur_date')->comment('求购期限')->nullable(); // 求购期限
        	$table->date('effectivetime')->comment('有效时间')->nullable(); // 有效时间
        	$table->string('tags',100)->comment('标签')->nullable(); //标签
        	$table->string('thumb',60); //相关图片
        	$table->string('pur_description',200);//求购著作权描述
        	$table->string('buy_name',30);//求购著作权名称
        	$table->string('spell',60)->comment('拼音')->nullable();
        	$table->integer('sorts')->default(0);
                $table->tinyInteger('num');
                $table->mediumInteger('hits')->default(0);
        	$table->string('logo_status',30)->comment('商标状态')->nullable();
        	$table->smallInteger('orders_num')->comment('订单数')->default(0);
                $table->tinyInteger('status')->default(1)->comment('1已审核2未审核3未审核通过');
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
		//
	}

}
