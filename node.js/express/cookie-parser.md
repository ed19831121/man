name: 	String
value: 	String|Object，如果是Object会在cookie.serialize()之前自动调用JSON.stringify对其进行处理
Option: Object，可使用的属性如下
	domain：	String		cookie在什么域名下有效，类型为String,。默认为网站域名
   	expires: 	Date		cookie过期时间，类型为Date。如果没有设置或设置为0，那么该cookie只在这个这个session有效，即关闭浏览器后，这个cookie会被浏览器删除
   	httpOnly: 	Boolean		只能被web server访问，类型Boolean。
   	maxAge:		String		实现expires的功能，设置cookie过期的时间，类型为String，指明从现在开始，多少毫秒以后，cookie到期。
   	path:		String// 	cookie在什么路径下有效，默认为'/'，类型为String
   	secure:		Boolean/false	只能被HTTPS使用，
   	signed:		Boolean/false	使用签名，express会使用req.secret来完成签名，需要cookie-parser配合使用`


name/value/damain/path/expires/maxAge/httpOnly/secure/signed


创建	res.cookie('name', 'koby', { domain: '.example.com', path: '/admin', secure: true });
删除	res.clearCookie(name [, options]);


req.cookies
req.session

POST request:
    www-form-urlencoded		默认的数据格式		body-parse
    form-data			数据上传		connect-multiparty
    application/json					bodyParser.json()
    text/xml			body-parser默认不支持这种数据格式

	
