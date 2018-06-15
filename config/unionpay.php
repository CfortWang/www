<?php
return [
	'merchant_id'           => '777290058160633',//银联商家编码
	'cert_path'             => 'C:/laragon/www/www/storage/app/unionpay/700000000000001_acp.pfx',//证书路径
	'cert_pwd'              => '000000',//证书密码
	'cert_dir'              => 'C:/laragon/www/www/storage/app/unionpay',//证书地址
	'wap_return_url'        => 'http://www.test/UnionPayReturn',//http://www.test/UnionPayReturn
	'wap_notify_url'        => 'http://www.test/UnionPayReturn1',//异步回调地址，后台地址
	'app_notify_url'        => 'http://www.test/UnionPayReturn2',//异步回调地址，后台地址
];