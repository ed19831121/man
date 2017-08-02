const store = new Vuex.Store({
	state: {
    		count: 0
  	},
  	mutations: {
    		increment (state) {
      			state.count++
    		}
  	}
})

store.commit('increment')			//通过 store.commit 方法触发状态变更

console.log(store.state.count) 			// -> 1		通过 store.state 来获取状态对象
