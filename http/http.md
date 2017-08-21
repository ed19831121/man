请求头							应答头
Accept							Content-Type
	Accept: text/html, application/xhtml+xml, application/xml;q=0.9, */*;q=0.8
Accept-Language						Content-Language
;q= (q-factor weighting)
值代表优先顺序，用相对质量价值 表示，又称为权重。
Accept-Encoding 					Content-Encoding 
							If-Modified-Since 
							If-Unmodified-Since 
								Last-Modified: <day-name>, <day> <month> <year> <hour>:<minute>:<second> GMT
								Last-Modified: Wed, 21 Oct 2015 07:28:00 GMT
								:包含源头服务器认定的资源做出修改的日期及时间
							ETag:	资源的特定版本的标识符。
								这可以让缓存更高效，并节省带宽，
								因为如果内容没有改变，Web服务器不需要发送完整的响应。
								而如果内容发生了变化，使用ETag有助于防止资源的同时更新相互覆盖（“空中碰撞”）。
								ETag: "33a64df551425fcc55e4d42a148795d9f25f89d4"	位于双引号之间的ASCII字符串
								ETag: W/"0815"						'W/'(大小写敏感) 表示使用弱验证器
If-Match
	If-Match: <etag_value>
	If-Match: <etag_value>, <etag_value>, …
	If-Match: "bfc13a64729c4290ef5b2c2730249c88ca92d82d"
	If-Match: W/"67ab43", "54ed21", "7892dd"
	If-Match: *


Allow: GET, POST, HEAD	枚举资源所支持的 HTTP 方法的集合

Cookie							 Set-Cookie
								<cookie-name>=<cookie-value>
								Expires=<date> 			如果没有设置这个属性，那么表示这是一个会话期 cookie 
								Max-Age=<non-zero-digit>	优先级更高 
								Domain=<domain-value>
								Path=<path-value>
								Secure
								HttpOnly
								SameSite=Strict
'									SameSite=Lax
Access-
Control-
Allow-
Origin
' 

