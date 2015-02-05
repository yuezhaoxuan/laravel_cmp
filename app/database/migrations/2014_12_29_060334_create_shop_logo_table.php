<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopLogoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_logo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',200);
			$table->mediumInteger('category_id');
			$table->integer('user_id');
			$table->string('level',15);
			$table->decimal('price', 6, 2)->nullable();

			$table->string('register_code',15)->comment('注册号')->nullable();
			$table->string('combine',10)->comment('组合类型');
			$table->string('server_list',100)->comment('核定使用商品')->nullable();
			$table->string('register',30)->comment('注册人')->nullable();
			$table->date('registration_date')->comment('注册日期')->nullable();
			$table->date('announced_date')->comment('公告日期')->nullable();
			$table->date('validity_date')->comment('有效日期')->nullable();
			$table->mediumInteger('region_id')->comment('注册所在地');
			$table->string('trading',60)->comment('交易方式');
			$table->string('logo_status',30)->comment('商标状态')->nullable();
			$table->string('similar_group',30)->comment('类似群组')->nullable();
			$table->string('tags',100)->comment('标签')->nullable();

			$table->string('thumb',60);
			$table->string('spell',60)->comment('拼音')->nullable();
			$table->tinyInteger('num');
			$table->mediumInteger('hits')->default(0);
			$table->smallInteger('orders_num')->comment('订单数')->default(0);
			$table->smallInteger('collect_num')->comment('收藏数')->default(0);
			$table->smallInteger('praise_num')->comment('点赞数')->default(0);
			$table->mediumInteger('comments')->default(100);
			$table->integer('sorts')->default(0);
			$table->boolean('recomment')->default(0)->comment('推荐');
			//$table->boolean('hot')->default(0)->comment('热门');
			$table->boolean('popularity')->default(0)->comment('人气');
			$table->boolean('sale')->default(0)->comment('促销');
			$table->boolean('boutique')->default(0)->comment('精品');
			$table->boolean('fixedprice')->default(0)->comment('一口价');
			$table->boolean('foreigns')->default(0)->comment('涉外');
			$table->boolean('antique')->default(0)->comment('古董');
			
            $table->tinyInteger('status')->default(1)->comment('1已审核2未审核3未审核通过');

            $table->string('keywords',150)->nullable();			
			$table->string('introduce',460);
			$table->text('content');
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
		Schema::drop('shop_logo');
	}

}
