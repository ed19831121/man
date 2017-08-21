sed 's/\.$/\!/g' 	a.txt	# 将 a.txt 内每一行结尾若为 . 则换成 ! 
sed '$a\This is a test' a.txt	# 在 a.txt 最后一行加入『 This is a test』


nl /etc/passwd | sed -e '3,$d' -e 's/bash/blueshell/'	# 删除/etc/passwd第三行到末尾的数据，并把bash替换为blueshel
5d               # delete line 5 only
5!d              # delete every line except line 5l	
/RE/s/LHS/RHS/g  # substitute only if RE occurs on the line
/^$/b label      # if the line is blank, branch to ':label'
/./!b label      # ... another way to write the same command
$!N              # on all lines but the last, get the Next line
'1~3d'		# delete every 3d line, starting with line 1, deletes lines 1, 4, 7, 10, 13, 16, ...
'0~3d' 		# deletes lines 3, 6, 9, 12, 15, 18, ...
'2~5p'		# print every 5th line, starting with line 2,  prints lines 2, 7, 12, 17, 22, 27, ...

x       		x为一行号,比如1
x,y     		表示行号范围从x到y,如2,5表示从第2行到第5行
/pattern/    		查询包含模式的行,如/disk/或/[a-z]/
/pattern/pattern/   	查询包含两个模式的行,如/disk/disks/
/pattern/,x  		在给定行号上查询包含模式的行,如/disk/,3
x,/pattern/  		通过行号和模式查询匹配行,如 3,/disk/
x,y!    		查询不包含指定行号x和y的行
