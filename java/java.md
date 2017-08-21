引用			指针
自动的废料收集
类之间的单继承		多继承
接口之间的多继承

---

assert 		断言条件是否满足
八种基本类型:
	六种数字类型（四个整数型，两个浮点型），
	一种字符类型，
	一种布尔型

boolean 	布尔数据类型			byte 		8-bit 有符号数据类型
char 		16-bit Unicode字符数据类型	short 		16位数字
float 		32-bit单精度浮点数		int 		32位整型数
double 		64-bit双精度浮点数		long 		64位整型数


new 		分配新的类实例
class 		定义类
package 	一系列相关类组成一个包
interface 	接口，一种抽象的类型，仅有方法和常量的定义
const 		未使用


if 		条件语句
else 		if条件不成立时执行的分支

do 		循环语句，循环体至少会执行一次
switch 		选择语句
case 		switch语句的一个条件

default 	switch语句中的默认分支
while 		while循环	
for 		for循环语句
continue 	不执行循环体剩余部分
break 		跳出循环或者label代码段
enum 		枚举类型
extends 	表示一个类是另一个类的子类
goto 		未使用


implements 	表示一个类实现了接口
import 		导入类
instanceof 	测试一个对象是否是某个类的实例
native 		表示方法用非java代码实现


super 		表示基类
this 		表示调用当前实例或者调用另一个构造函数
static 		表示在类级别定义，所有实例共享的
abstract 	抽象方法，抽象类的修饰符
final 		表示一个值在初始化之后就不能再改变了
		表示方法不能被重写，或者一个类不能有子类
private 	表示私有字段，或者方法等，只能从类内部访问
protected 	表示字段只能通过类或者其子类访问子类或者在同一个包内的其他类
public 		表示共有属性或者方法

return 		方法返回值
void 		标记方法不返回任何值
strictfp 	浮点数比较使用严格的规则
synchronized 	表示同一时间只能由一个线程访问的代码块
volatile 	标记字段可能会被多个线程同时访问，而不做同步

try 		表示代码块要做异常处理或者和finally配合表示是否抛出异常都执行finally中的代码
throw 		抛出异常
catch 		和try搭配捕捉异常信息
finally 	为了完成执行的代码而设计的，主要是为了程序的健壮性和完整性，无论有没有异常发生都执行代码。

throws 		定义方法可能抛出的异常
transient 	修饰不要序列化的字段

