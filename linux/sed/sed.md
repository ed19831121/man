sed: 不适用的选项 -- /
用法: sed [选项]... {脚本(如果没有其他脚本)} [输入文件]...

  -f 脚本文件, --file=脚本文件
                 添加“脚本文件”到程序的运行列表
  --follow-symlinks
                 直接修改文件时跟随软链接
  -i[SUFFIX], --in-place[=SUFFIX]
                 edit files in place (makes backup if SUFFIX supplied)
  -l N, --line-length=N
                 指定“l”命令的换行期望长度
  --posix
                 关闭所有 GNU 扩展
  -E, -r, --regexp-extended
                 use extended regular expressions in the script
                 (for portability use POSIX -E).
  -s, --separate
                 consider files as separate rather than as a single,
                 continuous long stream.
      --sandbox
                 operate in sandbox mode.
  -u, --unbuffered
                 从输入文件读取最少的数据，更频繁的刷新输出
  -z, --null-data
                 separate lines by NUL characters
      --help     打印帮助并退出
      --version  输出版本信息并退出

如果没有 -e, --expression, -f 或 --file 选项，那么第一个非选项参数被视为
sed脚本。其他非选项参数被视为输入文件，如果没有输入文件，那么程序将从标准
输入读取数据。

sed执行模板=sed '模式{命令1;命令2}'	

1. 逐行读入模式空间，
2. 执行命令，
3. 最后输出打印出来

-n:	隐藏默认输出内容	  -n, --quiet, --silent                 取消自动打印模式空间
-e:	脚本, --expression=脚本                 添加“脚本”到程序的运行列表




---

p:	打印当前模式空间内容，		追加到默认输出之后，
P:	打印当前模式空间开端至\n的内容，追加到默认输出之前。

sed并不对每行末尾\n进行处理，但是对N命令追加的行间\n进行处理，因为此时sed将两行看做一行

n:	提前读取下一行，
	覆盖模型空间前一行（并没有删除，因此依然打印至标准输出），如果命令未执行成功（并非跳过：前端条件不匹配），则放弃之后的任何命令，并对新读取的内容，重头执行sed。
N:	追加下一行到模式空间，
	同时将两行看做一行，但是两行之间依然含有\n换行符，
	如果命令未执行成功（并非跳过：前端条件不匹配），则放弃之后任何命令，并对新读取的内容，重头执行sed。
d:	删除当前模式空间内容		（不再传至标准输出），并放弃之后的命令，并对新读取的内容，重头执行sed。
D:	删除当前模式空间开端至\n的内容	（不再传至标准输出），放弃之后的命令，但是对剩余模式空间重新执行sed。

h:	将当前模式空间中内容	覆盖至	保持空间，
H:	将当前模式空间中内容	追加至	保持空间
g:	将当前保持空间中内容	覆盖至	模式空间，
G:	将当前保持空间中内容	追加至	模式空间
x:	将当前保持空间和模式空间内容互换

t:	当且仅当 当前行发生成功的替换 时 测试命令才跳转
y:	字符转换	sed 'y/his/HIS/' aaa  
$!:	条件满足（不是尾行）
:	如果没有指定标签，则将控制转移到脚本的结尾处

[line-address]r file:	将指定的文件读取到匹配行之后，并且输出到屏幕
[address]w 	file:
[line-address]q:	读取到匹配的行之后即退出，不会再读入新的行，并且将当前模式空间的内容输出到屏幕


---
sed -n 'n;p' aaa 		# 打印奇数行; -n不打印模式空间;n以下一行覆盖模式空间
sed ':a;N;s/\n/|/;ta' 1.txt	# 把换行替换为|
				# :a 和ta 是一对符号，:a是先做一个标记，然后如果ta之前执行成功，则跳转到:a标识符继续执行，达到了循环的效果。

.
*
+
[]
{n[,[m]]}
^
$
!
