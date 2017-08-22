use think\Route;	
类	方法
Route::rule(
	'路由表达式',
	'路由地址',
	'请求类型',
	'路由参数(数组)',
	'变量规则(数组)'
);
			 模块  控制器 方法
Route::rule('new/:id',	'index/News/read');
