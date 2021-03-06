<?php

class ShopPatentSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('shop_patent')->insert(
        	array(
        		array(
		            'title' => '专利1',
		           	'category_id' => 1,
		           	'user_id' => 1,
		           	'level' => '推荐商品',
		           	'price' => 1000,
		           	'register_code' => 11234568,
		           	'register' => 'Peen',
		           	'registration_date' => time(),
		           	'announced_date' => time(),
		           	'validity_date' => time(),
		           	'region_id' => 12,
		           	'trading' => '转让',
		           	'logo_status' => '网路',
		           	'tags' => '学习',
		           	'thumb' => '123.jpg',
		           	'spell' => 'pinyin',
		           	'keywords' => '网络',
		           	'introduce' => '描述猜测',
		           	'content' => '新的内容',
		           	'num' => 1,
		           	'hits' => 123,
		           	'orders_num' => 1,
		           	'comments' => 12,
		           	'sorts' => 1,
		           	'status' => 1,
		           	'hot' => 1,
		           	'fixedprice' => 2,
		           	'foreigns' => 1,
		           	'popularity' => 2,
	            ),
	            array(
		            'title' => '专利2',
		           	'category_id' => 1,
		           	'user_id' => 1,
		           	'level' => '推荐商品',
		           	'price' => 1000,
		           	'register_code' => 11234568,
		           	'register' => 'Peen',
		           	'registration_date' => time(),
		           	'announced_date' => time(),
		           	'validity_date' => time(),
		           	'region_id' => 12,
		           	'trading' => '转让',
		           	'logo_status' => '网路',
		           	'tags' => '学习',
		           	'thumb' => '123.jpg',
		           	'spell' => 'pinyin',
		           	'keywords' => '网络',
		           	'introduce' => '描述猜测',
		           	'content' => '新的内容',
		           	'num' => 1,
		           	'hits' => 123,
		           	'orders_num' => 1,
		           	'comments' => 12,
		           	'sorts' => 1,
		           	'status' => 1,
		           	'hot' => 1,
		           	'fixedprice' => 2,
		           	'foreigns' => 1,
		           	'popularity' => 2,
	            ),
	            array(
		            'title' => '专利3',
		           	'category_id' => 1,
		           	'user_id' => 1,
		           	'level' => '推荐商品',
		           	'price' => 1000,
		           	'register_code' => 11234568,
		           	'register' => 'Peen',
		           	'registration_date' => time(),
		           	'announced_date' => time(),
		           	'validity_date' => time(),
		           	'region_id' => 12,
		           	'trading' => '转让',
		           	'logo_status' => '网路',
		           	'tags' => '学习',
		           	'thumb' => '123.jpg',
		           	'spell' => 'pinyin',
		           	'keywords' => '网络',
		           	'introduce' => '描述猜测',
		           	'content' => '新的内容',
		           	'num' => 1,
		           	'hits' => 123,
		           	'orders_num' => 1,
		           	'comments' => 12,
		           	'sorts' => 1,
		           	'status' => 1,
		           	'hot' => 1,
		           	'fixedprice' => 2,
		           	'foreigns' => 1,
		           	'popularity' => 2,
	            ),
	            array(
		            'title' => '专利4',
		           	'category_id' => 1,
		           	'user_id' => 1,
		           	'level' => '推荐商品',
		           	'price' => 1000,
		           	'register_code' => 11234568,
		           	'register' => 'Peen',
		           	'registration_date' => time(),
		           	'announced_date' => time(),
		           	'validity_date' => time(),
		           	'region_id' => 12,
		           	'trading' => '转让',
		           	'logo_status' => '网路',
		           	'tags' => '学习',
		           	'thumb' => '123.jpg',
		           	'spell' => 'pinyin',
		           	'keywords' => '网络',
		           	'introduce' => '描述猜测',
		           	'content' => '新的内容',
		           	'num' => 1,
		           	'hits' => 123,
		           	'orders_num' => 1,
		           	'comments' => 12,
		           	'sorts' => 1,
		           	'status' => 1,
		           	'hot' => 1,
		           	'fixedprice' => 2,
		           	'foreigns' => 1,
		           	'popularity' => 2,
	            ),
	            array(
		            'title' => '专利5',
		           	'category_id' => 1,
		           	'user_id' => 1,
		           	'level' => '推荐商品',
		           	'price' => 1000,
		           	'register_code' => 11234568,
		           	'register' => 'Peen',
		           	'registration_date' => time(),
		           	'announced_date' => time(),
		           	'validity_date' => time(),
		           	'region_id' => 12,
		           	'trading' => '转让',
		           	'logo_status' => '网路',
		           	'tags' => '学习',
		           	'thumb' => '123.jpg',
		           	'spell' => 'pinyin',
		           	'keywords' => '网络',
		           	'introduce' => '描述猜测',
		           	'content' => '新的内容',
		           	'num' => 1,
		           	'hits' => 123,
		           	'orders_num' => 1,
		           	'comments' => 12,
		           	'sorts' => 1,
		           	'status' => 1,
		           	'hot' => 1,
		           	'fixedprice' => 2,
		           	'foreigns' => 1,
		           	'popularity' => 2,
	            ),
	        )
        );
	}

}