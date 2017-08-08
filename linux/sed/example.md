sed 's/\.$/\!/g' 	a.txt	# 将 a.txt 内每一行结尾若为 . 则换成 ! 
sed '$a\This is a test' a.txt	# 在 a.txt 最后一行加入『 This is a test』


nl /etc/passwd | sed -e '3,$d' -e 's/bash/blueshell/'	# 删除/etc/passwd第三行到末尾的数据，并把bash替换为blueshell	
