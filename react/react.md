React.createClass({
	getInitialState:function(){
		return {}
	},
	getDefaultProps: function() {	//为 props 设置默认值
    		return {
      			name: 'Runoob'
    		};
  	},
	handleClick:function(event){
		
	},
	propTypes: {
		title: React.PropTypes.string.isRequired,
  	},
	render:function(){
		return <h1>Hello {this.props.name}</h1>;
	}
})
ReactDOM.render()
React.PropTypes
className	class
htmlFor		for

ReactDOM.render(
	<React.createClass()/>,
	document.getElementById('aaa')
)

this.props		不可变
this.state
this.setState()

