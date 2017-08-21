
.vue
	<style>
	<template>
	<script>


Vue
	data:		function
	template:	string
	methods:	object
这个状态自管理应用包含以下几个部分：
	state，		驱动应用的数据源；
    	view，		以声明方式将state映射到视图；
    	actions，	响应在view上的用户输入导致的状态变化
---
全局配置				类型					默认值
        silent				boolean					false		取消 Vue 所有的日志与警告。
        optionMergeStrategies		{					{}		自定义'合并策略的选项'。
						[key: string]: Function				'合并策略选项'分别接受	
													第一个参数作为父实例，
					}								第二个参数为子实例，
													Vue实例上下文被作为第三个参数传入。 
        devtools
        errorHandler
        warnHandler
        ignoredElements
        keyCodes
        performance
        productionTip
全局 API
        Vue.extend		使用基础 Vue 构造器，创建一个“子类”。参数是一个包含组件选项的对象。
				<div id="mount-point"></div>

				var Profile = Vue.extend({	// 创建构造器
  					template: 	'<p>{{firstName}} {{lastName}} aka {{alias}}</p>',
  					data: 		function () {			//data 选项是特例，需要注意 - 在 Vue.extend() 中它必须是函数
    								return {
      									firstName: 'Walter',
      									lastName: 'White',
      									alias: 'Heisenberg'
    								}
  							}
				})
				new Profile().$mount('#mount-point')			// 创建 Profile 实例，并挂载到一个元素上。
        Vue.nextTick
        Vue.set(target,key,value)	`设置`{对象}的"属性"。
					如果{对象}是响应式的，确保"属性"被创建后也是响应式的，同时触发视图更新。
					这个方法主要用于避开 Vue 不能检测"属性"被添加的限制。
        Vue.delete(target,key)		`删除`{对象}的"属性"。
					如果{对象}是响应式的，确保删除能触发更新视图。
					这个方法主要用于避开 Vue 不能检测到"属性"被删除的限制，但是你应该很少会使用它。
        Vue.directive(id,[definition])	`注册`或`获取`全局指令。
					// 注册
					Vue.directive('my-directive', {
  						bind: 			function () {},
  						inserted: 		function () {},
  						update: 		function () {},
  						componentUpdated: 	function () {},
  						unbind: 		function () {}
					})
					// 注册（传入一个简单的指令函数）
					Vue.directive('my-directive', function () {
  						// 这里将会被 `bind` 和 `update` 调用
					})
					// getter，返回已注册的指令
					var myDirective = Vue.directive('my-directive')
        Vue.filter(id,[definition])	`注册`或`获取`全局过滤器。
					Vue.filter('my-filter', function (value) {	// 注册
  						// 返回处理后的值
					})
					var myFilter = Vue.filter('my-filter')		// getter，返回已注册的过滤器
        Vue.component(id,[definition])	注册或获取全局组件。注册还会自动使用给定的id设置组件的名称
					Vue.component('my-component', Vue.extend({ /* ... */ }))	// 注册组件，传入一个扩展过的构造器
					Vue.component('my-component', { /* ... */ })			// 注册组件，传入一个选项对象（自动调用 Vue.extend）
					var MyComponent = Vue.component('my-component')			// 获取注册的组件（始终返回构造器）
        Vue.use(plugin)			安装 Vue.js 插件。
					如果插件是一个对象，必须提供 install 方法。
					如果插件是一个函数，它会被作为 install 方法。install 方法将被作为 Vue 的参数调用。
					当 install 方法被	同一个插件	多次调用，插件将只会被安装一次
        Vue.mixin(mixin)		全局注册一个混合，影响注册之后所有创建的每个 Vue 实例。
					插件作者可以使用混合，向组件注入自定义的行为。不推荐在应用代码中使用。
        Vue.compile(template)		在render函数中编译模板字符串。只在独立构建时有效
					var res = Vue.compile('<div><span>{{ msg }}</span></div>')
					new Vue({
  						data: {
    							msg: 'hello'
  						},
  						render: 	 res.render,
  						staticRenderFns: res.staticRenderFns
					})
        Vue.version			提供字符串形式的 Vue 安装版本号。
					这对社区的插件和组件来说非常有用，你可以根据不同的版本号采取不同的策略。
					var version = Number(Vue.version.split('.')[0])
					if (version === 2) {
  						// Vue v2.x.x
					} else if (version === 1) {
  						// Vue v1.x.x
					} else {
  						// Unsupported versions of Vue
					}
选项 / 数据
        data
        props
        propsData
        computed
        methods
        watch
选项 / DOM
        el
        template
        render
        renderError
选项 / 生命周期钩子
	beforeCreate
              created
        beforeMount
              mounted
        beforeUpdate
              updated
        activated
        deactivated
        beforeDestroy
              destroyed
选项 / 资源
        directives		包含 Vue 实例	可用指令	的哈希表。
        filters			包含 Vue 实例	可用过滤器	的哈希表。
        components		包含 Vue 实例	可用组件	的哈希表。
选项 / 组合
        parent			指定已创建的实例之父实例，在两者之间建立父子关系。
				子实例可以用 this.$parent 访问父实例，
				子实例被推入父实例的 $children 数组中。
        mixins
        extends
        provide / inject
选项 / 其它
        name
        delimiters
        functional
        model
        inheritAttrs
        comments
实例属性			类型
        vm.$data		Object				Vue 实例观察的数据对象。Vue 实例代理了对其 data 对象属性的访问。
        vm.$props		Object				一个对象，代表当前组件收到的 props。Vue 示例代理访问到这个 props 对象的属性们。
        vm.$el			HTMLElement			Vue 实例使用的根 DOM 元素。
        vm.$options		Object			用于当前 Vue 实例的初始化选项。需要在选项中包含自定义属性时会有用处：
							new Vue({
  								customOption: 	'foo',
  								created: 	function () {
    									console.log(this.$options.customOption) // -> 'foo'
  								}
							})
        vm.$parent		Vue instance		父实例，如果当前实例有的话。
        vm.$root		Vue instance		当前组件树的根 Vue 实例。如果当前实例没有父实例，此实例将会是其自已。
        vm.$children		Array<Vue instance>	当前实例的直接子组件。
							需要注意 $children 并不保证顺序，也不是响应式的。
							如果你发现自己正在尝试使用 $children 来进行数据绑定，
							考虑使用一个数组配合 v-for 来生成子组件，
							并且使用 Array 作为真正的来源。
        vm.$slots		{ [name: string]: ?Array<VNode> }	
							用来访问被 slot 分发的内容。
							每个具名 slot 有其相应的属性（例如：slot="foo" 中的内容将会在 vm.$slots.foo 中被找到）。
							default 属性包括了所有没有被包含在具名 slot 中的节点。
							在使用 render 函数书写一个组件时，访问 vm.$slots 最有帮助。
				<blog-post>
  					<h1 slot="header">
    						About Me
  					</h1>
  					<p>Here's some page content, which will be included in vm.$slots.default, because it's not inside a named slot.</p>
  					<p slot="footer">
    						Copyright 2016 Evan You
  					</p>
  					<p>If I have some content down here, it will also be included in vm.$slots.default.</p>.
				</blog-post>

				Vue.component('blog-post', {
  					render: function (createElement) {
    						var header = this.$slots.header
    						var body   = this.$slots.default
    						var footer = this.$slots.footer
    						return createElement('div', [
      							createElement('header', header),
      							createElement('main', 	body),
      							createElement('footer', footer)
    						])
  					}
				})
        vm.$scopedSlots		{ [name: string]: props => VNode | Array<VNode> }
							用来访问 scoped slots。
							对于包括 默认 slot 在内的每一个 slot， 该对象都包含一个返回相应 VNode 的函数。
							在使用 render 函数 书写一个组件时，访问 vm.$scopedSlots 最有帮助。
        vm.$refs		Object			一个对象，其中包含了所有拥有 ref 注册的子组件。
        vm.$isServer		boolean			当前 Vue 实例是否运行于服务器。
        vm.$attrs		{[key:string]:string}	包含了父作用域中不被认为 (且不预期为) props 的特性绑定 (class 和 style 除外)。
							当一个组件没有声明任何 props 时，这里会包含所有父作用域的绑定 (class 和 style 除外)，
							并且可以通过 v-bind="$attrs" 传入内部组件——在创建更高层次的组件时非常有用。
        vm.$listeners		{ [key: string]: Function | Array<Function> }
							包含了父作用域中的 (不含 .native 修饰器的) v-on 事件监听器。
							它可以通过 v-on="$listeners" 传入内部组件——在创建更高层次的组件时非常有用。
    实例方法 / 数据
        vm.$watch
        vm.$set
        vm.$delete
    实例方法/事件
        vm.$on
        vm.$once
        vm.$off
        vm.$emit
    实例方法 / 生命周期
        vm.$mount
        vm.$forceUpdate
        vm.$nextTick
        vm.$destroy
    指令
        v-text
        v-html
        v-show
        v-if
        v-else
        v-else-if
        v-for
        v-on
        v-bind
        v-model
        v-pre
        v-cloak
        v-once
    特殊属性
        key
        ref
        slot
        is
    内置的组件
        component
        transition
        transition-group
        keep-alive
        slot
    VNode接口
    服务端渲染
