// 如果在模块化构建系统中，请确保在开头调用了 Vue.use(Vuex)

const store = new Vuex.Store(
	{
		state: {
    			count: 0
  		},
  		mutations: {
    			increment (state) {
      				state.count++
    			}
  		}
	}
)

store.commit('increment')			//通过 store.commit 方法触发状态变更

console.log(store.state.count) // -> 1		通过 store.state 来获取状态对象

---
// 创建一个 Counter 组件
const Counter = {
  template: `<div>{{ count }}</div>`,
  computed: {
    count () {
      return this.$store.state.count
    }
  }
}

const app = new Vue({
  	el: 		'#app',
  	store,			// 把 store 对象提供给 “store” 选项，这可以把 store 的实例注入所有的子组件
  	components: 	{ 
		Counter 
	},
  	template: `
    		<div class="app">
      			<counter></counter>
    		</div>
  	`
})

import { mapState } from 'vuex'			// 在单独构建的版本中辅助函数为 Vuex.mapState

export default {
  	// ...
  	computed: 	mapState(
		{
    			count: 		state => state.count,		// 箭头函数可使代码更简练
    			countAlias: 	'count',			// 传字符串参数 'count' 等同于 `state => state.count`
    			countPlusLocalState (state) {			// 为了能够使用 `this` 获取局部状态，必须使用常规函数
      				return state.count + this.localCount
    			}
  		}
	)
}

---
const store = new Vuex.Store({
	state: {
    		todos: [
      			{ 
				id: 	1, 
				text: 	'...', 
				done: true 
			},
      			{ 	
				id: 	2, 
				text: 	'...', 
				done: 	false 
			}
    		]
  	},
  	getters: {
    		doneTodos: state => {
      			return state.todos.filter(todo => todo.done)
    		}
  	}
})

store.getters.doneTodos // -> [{ id: 1, text: '...', done: true }]	Getters 会暴露为 store.getters 对象：
---


API 参考
Vuex.Store

import Vuex from 'vuex'

const store = new Vuex.Store({ ...options })

Vuex.Store 构造器选项
			类型
	state        	Object	       			Vuex store 实例的根 state 对象。
	mutations    	{ [type: string]: Function }	在 store 上注册 mutation，处理函数总是接受 	state 作为第一个参数（如果定义在模块中，则为模块的局部状态），
													payload 作为第二个参数（可选）。
	actions		{ [type: string]: Function }	在 store 上注册 action。处理函数接受一个 context 对象，包含以下属性：
        {
          state,     	// 等同于 store.state, 若在模块中则为局部状态
          rootState, 	// 等同于 store.state, 只存在于模块中
          commit,    	// 等同于 store.commit
          dispatch,  	// 等同于 store.dispatch
          getters    	// 等同于 store.getters
        }
	getters		{ [key: string]: Function }	在 store 上注册 getter，
		接受以下参数：
		state,     // 如果在模块中定义则为模块的局部状态
      		getters,   // 等同于 store.getters
      		rootState  // 等同于 store.state
		注册的 getter 暴露为 store.getters。
	modules		Object				包含了子模块的对象，会被合并到 store，大概长这样：
        {
          key: {
            state,
            mutations,
            actions?,
            getters?,
            modules?
          },
          ...
        }

        与根模块的选项一样，每个模块也包含 state 和 mutations 选项。模块的状态使用 key 关联到 store 的根状态。模块的 mutation 和 getter 只会接收 module 的局部状态作为第一个参数，而不是根状态，并且模块 action 的 context.state 同样指向局部状态。
	plugins		Array<Function>			一个数组，包含应用在 store 上的插件方法。
							这些插件直接接收 store 作为唯一参数，	可以监听 mutation	（用于外部地数据持久化、记录或调试）
												或者提交 mutation 	（用于内部数据，例如 websocket 或 某些观察者）
	strict		Boolean:false			使 Vuex store 进入严格模式，在严格模式下，任何 mutation 处理函数以外修改 Vuex state 都会抛出错误。
Vuex.Store 实例属性
    state       类型: Object        根状态，只读。
    getters	类型: Object        暴露出注册的 getter，只读。
Vuex.Store 实例方法
    commit(	type: string, payload?: any) | commit(mutation: Object)		提交 mutation。 
    dispatch(	type: string, payload?: any) | dispatch(action: Object)    	分发 action。返回 action 方法的返回值，如果多个处理函数被触发，那么返回一个 Pormise。
    replaceState(state: Object)							替换 store 的根状态，仅用状态合并或 time-travel 调试。
    	watch(
		getter: Function, 
		cb: 	Function, 
		options?: Object
	)   								响应式地监测一个 getter 方法的返回值，当值改变时调用回调函数。
									getter 接收 store 的状态作为唯一参数。接收一个可选的对象参数表示 Vue 的 vm.$watch 方法的参数。
									要停止监测，直接调用返回的处理函数。
    	subscribe(handler: Function)    注册监听 store 的 mutation。handler 会在每个 mutation 完成后调用，接收 mutation 和经过 mutation 后的状态作为参数：
	store.subscribe((mutation, state) => {
      		console.log(mutation.type)
      		console.log(mutation.payload)
    	})    通常用于插件。 

	registerModule(path: string | Array<string>, module: Module)	注册一个动态模块。 
	unregisterModule(path: string | Array<string>)			卸载一个动态模块。 
	hotUpdate(	newOptions: Object)    				热替换新的 action 和 mutation。 

组件绑定的辅助函数

    	mapState(	map: Array<string> | Object): Object    	创建组件的计算属性返回 	Vuex store 中的状态。
    	mapGetters(	map: Array<string> | Object): Object		创建组件的计算属性返回 	getter 的返回值。 
    	mapActions(	map: Array<string> | Object): Object		创建组件方法分发 	action。 
	mapMutations(	map: Array<string> | Object): Object  		创建组件方法提交 	mutation。 


