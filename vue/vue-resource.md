Configuration
Set default values using the global configuration.
	Vue.http.options.root = '/root';
	Vue.http.headers.common['Authorization'] = 'Basic YXBpOnBhc3N3b3Jk';
Set default values inside your Vue component options.
	new Vue({
		http: {
    			root: '/root',
    			headers: {
      			Authorization: 'Basic YXBpOnBhc3N3b3Jk'
    			}
  		}
	})

Note that for the root option to work, the path of the request must be relative. This will use this the root option: Vue.http.get('someUrl') while this will not: Vue.http.get('/someUrl').

Webpack/Browserify

Add vue and vue-resource to your package.json, then npm install, then add these lines in your code:
	var Vue 	= require('vue');
	var VueResource = require('vue-resource');
	Vue.use(VueResource);

Legacy web servers

If your web server can't handle requests encoded as application/json, you can enable the emulateJSON option. 
This will send the request as application/x-www-form-urlencoded MIME type, as if from an normal HTML form.

	Vue.http.options.emulateJSON = true;

If your web server can't handle REST/HTTP requests like PUT, PATCH and DELETE, you can enable the emulateHTTP option. 
This will set the X-HTTP-Method-Override header with the actual HTTP method and use a normal POST request.

	Vue.http.options.emulateHTTP = true;
---
HTTP
'The http service' can be used 
	globally Vue.http or 
	in a Vue instance this.$http.
Usage

A Vue instance provides the this.$http service which can send HTTP requests. 
A request method call returns a Promise that resolves to the response. 
Also the Vue instance will be automatically bound to this in all function callbacks.

{
  // GET /someUrl
  this.$http.get('/someUrl').then(response => {
    // success callback
  }, response => {
    // error callback
  });
}

Methods

Shortcut methods are available for all request types. These methods work globally or in a Vue instance.

// global Vue object
Vue.http.get('/someUrl', [options]).then(successCallback, errorCallback);
Vue.http.post('/someUrl', [body], [options]).then(successCallback, errorCallback);

// in a Vue instance
this.$http.get('/someUrl', [options]).then(successCallback, errorCallback);
this.$http.post('/someUrl', [body], [options]).then(successCallback, errorCallback);

List of shortcut methods:

    get(url, [options])
    head(url, [options])
    delete(url, [options])
    jsonp(url, [options])
    post(url, [body], [options])
    put(url, [body], [options])
    patch(url, [body], [options])

Options
Parameter 	Type 				Description
url 		string 				URL to which the request is sent
body 		Object, FormData, string 	Data to be sent as the request body
headers 	Object 				Headers object to be sent as HTTP request headers
params 		Object 				Parameters object to be sent as URL parameters
method 		string 				HTTP method (e.g. GET, POST, ...)
responseType 	string 				Type of the response body (e.g. text, blob, json, ...)
timeout 	number 				Request timeout in milliseconds (0 means no timeout)
before 		function(request) 		Callback function to modify the request options before it is sent
progress 	function(event) 		Callback function to handle the ProgressEvent of uploads
credentials 	boolean 			Indicates whether or not cross-site Access-Control requests should be made using credentials
emulateHTTP 	boolean 			Send PUT, PATCH and DELETE requests with a HTTP POST and set the X-HTTP-Method-Override header
emulateJSON 	boolean 			Send request body as application/x-www-form-urlencoded content type
Response

A request resolves to a response object with the following properties and methods:
Property 	Type 			Description
url 		string 			Response URL origin
body 		Object, Blob, string 	Response body
headers 	Header 			Response Headers object
ok 		boolean 		HTTP status code between 200 and 299
status 		number 			HTTP status code of the response
statusText 	string 			HTTP status text of the response

Method 		Type 		Description
text() 		Promise 	Resolves the body as string
json() 		Promise 	Resolves the body as parsed JSON object
blob() 		Promise 	Resolves the body as Blob object
Example

{
  // POST /someUrl
  this.$http.post('/someUrl', {foo: 'bar'}).then(response => {

    // get status
    response.status;

    // get status text
    response.statusText;

    // get 'Expires' header
    response.headers.get('Expires');

    // get body data
    this.someData = response.body;

  }, response => {
    // error callback
  });
}

Send a get request with URL query parameters and a custom headers.

{
  // GET /someUrl?foo=bar
  this.$http.get('/someUrl', {params: {foo: 'bar'}, headers: {'X-Custom': '...'}}).then(response => {
    // success callback
  }, response => {
    // error callback
  });
}

Fetch an image and use the blob() method to extract the image body content from the response.

{
  // GET /image.jpg
  this.$http.get('/image.jpg', {responseType: 'blob'}).then(response => {

    // resolve to Blob
    return response.blob();

  }).then(blob => {
    // use image Blob
  });
}

Interceptors

Interceptors can be defined globally and are used for pre- and postprocessing of a request. If a request is sent using this.$http or this.$resource the current Vue instance is available as this in a interceptor callback.
Request processing

Vue.http.interceptors.push(function(request, next) {

  // modify method
  request.method = 'POST';

  // modify headers
  request.headers.set('X-CSRF-TOKEN', 'TOKEN');
  request.headers.set('Authorization', 'Bearer TOKEN');

  // continue to next interceptor
  next();
});

Request and Response processing

Vue.http.interceptors.push(function(request, next) {

  // modify request
  request.method = 'POST';

  // continue to next interceptor
  next(function(response) {

    // modify response
    response.body = '...';

  });
});

Return a Response and stop processing

Vue.http.interceptors.push(function(request, next) {

  // modify request ...

  // stop and return response
  next(request.respondWith(body, {
    status: 404,
    statusText: 'Not found'
  }));
});

Overriding default interceptors

All default interceptors callbacks can be overriden to change their behavior. All interceptors are exposed through the Vue.http.interceptor object with their names before, method, jsonp, json, form, header and cors.

Vue.http.interceptor.before = function(request, next) {

  // override before interceptor

  next();
};
---
1. Request{
  constructor	(	object: options)					
  url 		(	string)							
  body 		(	any)
  headers 	(	Headers)
  method 	(	string)
  params 	(	object)
  timeout 	(	number)
  credentials 	(	boolean)
  emulateHTTP 	(	boolean)
  emulateJSON 	(	boolean)
  before 	(	function(Request))
  progress 	(	function(Event))

  
  getUrl() (string)
  getBody() (any)
  respondWith(any: body, object: options) (Response)
  abort()
}

2. Response{
  	constructor(
		any: body, 
		object: {
			string: url, 
			object: headers, 
			number: status, 
			string: statusText
		}
	)

  url (		string)
  body (	any)
  headers (	Headers)
  ok (		boolean)
  status (	number)
  statusText (	string)

  blob() (Promise)
  text() (Promise)
  json() (Promise)
}

3. Headers{
  constructor(object: headers)

  map (object)

  has(		string: name) (boolean)
  get(		string: name) (string)
  getAll(			) (string[])
  set(		string: name, string: value) (void)
  append(	string: name, string: value) (void)
  delete(	string: name) (void)
  forEach(	function: callback, any: thisArg) (void)
}
