动态路由匹配

我们经常需要把
	某种模式	匹配到的
	所有路由，	全都映射到
	同个组件。

例如，	我们有一个 User 组件，
	对于所有 ID 各不相同的用户，
	都要使用这个组件来渲染。
那么，	我们可以在 vue-router 的路由路径中使用『动态路径参数』（dynamic segment）来达到这个效果：

<div id="app">
  	<router-view></router-view>	//最顶层的出口，渲染最高级路由匹配到的组件
</div>

const User = {
  	template: `
    		<div class="user">
      			<h2>User {{ $route.params.id }}</h2>
      			<router-view></router-view>
    			</div>
  	`,
	watch: {
    		'$route' (to, from) {
      			// 对路由变化作出响应...
    		}
  	}
}

const router = new VueRouter({
  	routes: [					//	路由配置数组. routes 配置中的每个路由对象为 路由记录
    		{ 					//	一个路由
			path: 		'/user/:id',	//	一个『路径参数』使用冒号 : 标记。当匹配到一个路由时，参数值会被设置到 this.$route.params 
			component: 	User,
			name: 		'user',		//	通过一个名称来标识一个路由
			children: [			//children = routes
        			{
          				// 当 /user/:id/profile 匹配成功，
          				// UserProfile 会被渲染在 User 的 <router-view> 中
          				path: 		'profile',
          				component: 	UserProfile,
					meta: 		{ 
						requiresAuth: true 
					}
        			},
        			{
          				// 当 /user/:id/posts 匹配成功
          				// UserPosts 会被渲染在 User 的 <router-view> 中
          				path: 'posts',
          				component: UserPosts
        			}
      			] 
		}			// 动态路径参数 以冒号开头
  	]
	
})
---
const router = new VueRouter({
	routes: [
		{
			path: 		'/',
      			components: {
        				default: 	Foo,
        				a: 		Bar,
        				b: 		Baz
      			}
    		}
  	]
})


<router-view class="view one"></router-view>
<router-view class="view two" name="a"></router-view>
<router-view class="view three" name="b"></router-view>
---
	声明式 									编程式
点击 	<router-link :to="...">(创建 a 标签来定义导航链接) 等同于调用 		router.push(...)
	<router-link :to="{ name: 'user', params: { userId: 123 }}" replace> 	router.replace(...)	不会向 history 添加新记录，而是 替换掉当前的 history 记录。
	router.go(n)											在 history 记录中向前或者后退多少步，类似 window.history.go(n)。
	
// 字符串	'home'
// 对象		{ 
			path: 'home' 
		}
// 命名的路由	{ 
			name: 	'user', 
			params: { 
				userId: 123 
			}
		}
// 带查询参数，变成 /register?plan=private	{ 
							path: 	'register', 
							query: 	{ 
								plan: 'private' 
							}
						}

path	->	routes	->	component	-> template


router	->	VueRouter	->	routes	->	path
							component
							children	->	path
										compoment
---
const router = new VueRouter({ ... })
全局钩子
router.beforeEach(
	(
		to,		//Route		即将要进入的		目标路由对象 
		from, 		//Route		当前导航正要离开的	路由
		next		//Function	next(): 		进行管道中的下一个钩子。如果全部钩子执行完了，则导航的状态就是 confirmed （确认的）。
						next(false): 		中断当前的导航。	如果浏览器的 URL 改变了（可能是用户手动或者浏览器后退按钮），
												那么 URL 地址会重置到 from 路由对应的地址。
						next('/') 或者 
						next({ path: '/' }): 	跳转到一个不同的地址。	当前的导航被中断，然后进行一个新的导航。
	
	) => {
		if (to.matched.some(record => record.meta.requiresAuth)) {
    			// this route requires auth, check if logged in
    			// if not, redirect to login page.
    			if (!auth.loggedIn()) {
      				next(
					{
        					path: 	'/login',
        					query: 	{ 
							redirect: to.fullPath 
						}
      					}
				)
    			} else {
      				next()
    			}
  		} else {
    			next() // 确保一定要调用 next()
  		}
	}
)

router.afterEach(		//after 钩子没有 next 方法，不能改变导航：
	route => {
  		// ...
	}
)	

某个路由独享的钩子
const router = new VueRouter({
	routes: [
		{
      			path: 		'/foo',
      			component: 	Foo,
      			beforeEnter: 	(to, from, next) => {
        			// ...
      			}
    		}
  	]
}
)

组件内的钩子

const Foo = {
	template: `...`,
  	beforeRouteEnter (to, from, next) {
    		// 在渲染该组件的对应路由被 confirm 前调用
    		// 不！能！获取组件实例 `this`
    		// 因为当钩子执行前，组件实例还没被创建
		next(		//通过传一个回调给 next来访问组件实例。在导航被确认的时候执行回调，并且把组件实例作为回调方法的参数。
			vm => {
    				// 通过 `vm` 访问组件实例
  			}
		)
  	},
  	beforeRouteUpdate (to, from, next) {
    		// 在当前路由改变，但是该组件被复用时调用
    		// 举例来说，对于一个带有动态参数的路径 /foo/:id，在 /foo/1 和 /foo/2 之间跳转的时候，
    		// 由于会渲染同样的 Foo 组件，因此组件实例会被复用。而这个钩子就会在这个情况下被调用。
    		// 可以访问组件实例 `this`
  	},
  	beforeRouteLeave (to, from, next) {
    		// 导航离开该组件的对应路由时调用
    		// 可以访问组件实例 `this`
  	}
}

---
单个路由的过渡
const Foo = {
	template: `
    		<transition name="slide">
      		<div class="foo">...</div>
    		</transition>
  	`
}
const Bar = {
	template: `
    		<transition name="fade">
      		<div class="bar">...</div>
    		</transition>
  	`
}

基于路由的动态过渡
<transition :name="transitionName">
	<router-view></router-view>
</transition>

// 接着在父组件内
// watch $route 决定使用哪种过渡
watch: {
	'$route' (to, from) {
    		const toDepth 		= to.path.split('/').length
    		const fromDepth 	= from.path.split('/').length
    		this.transitionName 	= toDepth < fromDepth ? 'slide-right' : 'slide-left'
  }
}

