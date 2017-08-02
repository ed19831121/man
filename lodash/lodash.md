Array

1. 
	_.chunk(
		array, 		(Array): 需要被处理的数组。
		[size=1]	(number): 每个块的长度
	)(Array): 返回一个包含拆分块数组的新数组（相当于一个二维数组）。
 				将 	array 拆分成多个  'size长度的块'，把'这些块'组成'一个新数组' 
				如果 	array 无法被分割成'全部等长的块'，那么'最后剩余的元素'将组成'一个块'
		_.chunk(['a', 'b', 'c', 'd'], 2);	// => [['a', 'b'], ['c', 'd']]
		_.chunk(['a', 'b', 'c', 'd'], 3);	// => [['a', 'b', 'c'], ['d']]

2. 	_.compact(array)		创建一个新数组并包含原数组中所有的非假值元素。例如 false、null、 0、""、undefined 和 NaN 都是“假值”。
		_.compact([0, 1, false, 2, '', 3]);	// => [1, 2, 3]
3. 	_.difference(
		array,		 (Array): 需要过滤的数组 
		[values]	 (...Array): 数组需要排除掉的值
	)				Creates an array of unique array values not included in the other provided arrays using SameValueZero for equality comparisons.
		_.difference([1, 2, 3], [4, 2]);	// => [1, 3]
		_.difference([1, '2', 3], [4, 2]);	// => [1, "2", 3]
_.drop
	_.dropRight(		
		array, 		(Array): 被操作的数组。
		[n=1]		(number): 去掉的元素个数。
	) 				将 array 中的前 n 个元素去掉，然后返回剩余的部分。
		_.drop([1, 2, 3]);			// => [2, 3] 默认是1开始的
		_.drop([1, 2, 3], 2);			// => [3]
		_.drop([1, 2, 3], 5);			// => []
		_.drop([1, 2, 3], 0);			// => [1, 2, 3]
	_.dropRightWhile(	
		array, 		(Array): 需要被处理数组。
		[n=1]		(number): 去掉的元素个数。
	)				将 array 尾部的 n 个元素去除，并返回剩余的部分。
		_.dropRight([1, 2, 3]);			// => [1, 2]
		_.dropRight([1, 2, 3], 2);		// => [1]
		_.dropRight([1, 2, 3], 5);		// => []
		_.dropRight([1, 2, 3], 0);		// => [1, 2, 3]
	_.dropWhile(
		array, 				需要查询的数组
		[predicate=_.identity], 	(
							Function|
							Object|			如果参数predicate提供的是一个对象，就使用 _.matches方法匹配相同的元素，
										相同返回true,
										不同返回false
							string		属性名称，就通过提供的参数使用 _.property方法返回一个回调函数
						): 数组迭代判断条件
		[thisArg]			(*): 对应 predicate 属性的值	如果参数thisArg提供的话，就使用 _.matchesProperty方法匹配相同的属性值，
										相同返回true,
										不同返回false 
	)				从尾端查询（右数）数组 array ，第一个不满足predicate 条件的元素开始截取数组. thisArg为predicate 条件执行上下文对象绑定的参数 . 
	_.fill
	_.findIndex
	_.findLastIndex
	_.first
	_.flatten
	_.flattenDeep
	_.head -> first
	_.indexOf
	_.initial
	_.intersection
	_.last
	_.lastIndexOf
	_.object -> zipObject
	_.pull
	_.pullAt
	_.remove
	_.rest
	_.slice
	_.sortedIndex
	_.sortedLastIndex
	_.tail -> rest
	_.take
	_.takeRight
	_.takeRightWhile
	_.takeWhile
	_.union
	_.uniq
	_.unique -> uniq
	_.unzip
	_.unzipWith
	_.without
	_.xor
	_.zip
	_.zipObject
	_.zipWith

Chain

	_
	_.chain
	_.tap
	_.thru
	_.prototype.chain
	_.prototype.commit
	_.prototype.concat
	_.prototype.plant
	_.prototype.reverse
	_.prototype.run -> value
	_.prototype.toJSON -> value
	_.prototype.toString
	_.prototype.value
	_.prototype.valueOf -> value

Collection

	_.all -> every
	_.any -> some
	_.at
	_.collect -> map
	_.contains -> includes
	_.countBy
	_.detect -> find
	_.each -> forEach
	_.eachRight -> forEachRight
	_.every
	_.filter
	_.find
	_.findLast
	_.findWhere
	_.foldl -> reduce
	_.foldr -> reduceRight
	_.forEach
	_.forEachRight
	_.groupBy
	_.include -> includes
	_.includes
	_.indexBy
	_.inject -> reduce
	_.invoke
	_.map
	_.partition
	_.pluck
	_.reduce
	_.reduceRight
	_.reject
	_.sample
	_.select -> filter
	_.shuffle
	_.size
	_.some
	_.sortBy
	_.sortByAll
	_.sortByOrder
	_.where

Date

	_.now

Function

	_.after
	_.ary
	_.backflow -> flowRight
	_.before
	_.bind
	_.bindAll
	_.bindKey
	_.compose -> flowRight
	_.curry
	_.curryRight
	_.debounce
	_.defer
	_.delay
	_.flow
	_.flowRight
	_.memoize
	_.modArgs
	_.negate
	_.once
	_.partial
	_.partialRight
	_.rearg
	_.restParam
	_.spread
	_.throttle
	_.wrap

Lang

	_.clone
	_.cloneDeep
	_.eq -> isEqual
	_.gt
	_.gte
	_.isArguments
	_.isArray
	_.isBoolean
	_.isDate
	_.isElement
	_.isEmpty
	_.isEqual
	_.isError
	_.isFinite
	_.isFunction
	_.isMatch
	_.isNaN
	_.isNative
	_.isNull
	_.isNumber
	_.isObject
	_.isPlainObject
	_.isRegExp
	_.isString
	_.isTypedArray
	_.isUndefined
	_.lt
	_.lte
	_.toArray
	_.toPlainObject

Math

	_.add
	_.ceil
	_.floor
	_.max
	_.min
	_.round
	_.sum

Number

	_.inRange
	_.random

Object

	_.assign
	_.create
	_.defaults
	_.defaultsDeep
	_.extend -> assign
	_.findKey
	_.findLastKey
	_.forIn
	_.forInRight
	_.forOwn
	_.forOwnRight
	_.functions
	_.get
	_.has
	_.invert
	_.keys
	_.keysIn
	_.mapKeys
	_.mapValues
	_.merge
	_.methods -> functions
	_.omit
	_.pairs
	_.pick
	_.result
	_.set
	_.transform
	_.values
	_.valuesIn

String

	_.camelCase
	_.capitalize
	_.deburr
	_.endsWith
	_.escape
	_.escapeRegExp
	_.kebabCase
	_.pad
	_.padLeft
	_.padRight
	_.parseInt
	_.repeat
	_.snakeCase
	_.startCase
	_.startsWith
	_.template
	_.trim
	_.trimLeft
	_.trimRight
	_.trunc
	_.unescape
	_.words

Utility

	_.attempt
	_.callback
	_.constant
	_.identity
	_.iteratee -> callback
	_.matches
	_.matchesProperty
	_.method
	_.methodOf
	_.mixin
	_.noConflict
	_.noop
	_.property
	_.propertyOf
	_.range
	_.runInContext
	_.times
	_.uniqueId

Methods

	_.templateSettings.imports._

Properties

	_.VERSION
	_.support
	_.support.enumErrorProps
	_.support.enumPrototypes
	_.support.nonEnumShadows
	_.support.ownLast
	_.support.spliceObjects
	_.support.unindexedChars
	_.templateSettings
	_.templateSettings.escape
	_.templateSettings.evaluate
	_.templateSettings.imports
	_.templateSettings.interpolate
	_.templateSettings.variable


