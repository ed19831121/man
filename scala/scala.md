数据类型 	描述

Byte 		8位	有符号补码整数。数值区间为 -128 		到 127
Short 		16位	有符号补码整数。数值区间为 -32768 		到 32767
Int 		32位	有符号补码整数。数值区间为 -2147483648 		到 2147483647
Long 		64位	有符号补码整数。数值区间为 -9223372036854775808 到 9223372036854775807

Float 		32位	IEEE754单精度浮点数
Double 		64位	IEEE754单精度浮点数

Char 		16位	无符号Unicode字符, 区间值为 U+0000 到 U+FFFF
String 		字符序列

Boolean 		true	或	false
Unit 		表示	无值，和其他语言中void等同。用作不返回任何结果的方法的结果类型。Unit只有一个实例值，写成()。
Null 			null 	或	空引用
Nothing 	Nothing类型在Scala的类层级的最低端；它是'任何其他类型'的					子类型。
Any 		Any	是				'所有其他类'的					超类
AnyRef 		AnyRef类是	Scala里			'所有引用类(reference class)'的			基类

数组,存储	固定大小的	同类型	元素
	var z:Array[String] = new Array[String](3)
	或
	var z = new Array[String](3)

---
package scala
final case class Symbol private (name: String) {
   override def toString: String = "'" + name
}

package  com{
	package object ggd543{
    		type 	HashMap[A,B] 	= scala.collection.mutable.HashMap[A,B];
    		val 	HashMap 	= scala.collection.mutable.HashMap
    		def 	print 		= println("hello, ggd543")
 	}
	package object aiguozhe{
    		var 	name 		= "aiguozhe"
    		def 	sayHello 	= println("hello")
  	}
}
