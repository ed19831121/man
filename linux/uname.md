用法：uname [选项]...		输出一组系统信息。如果不跟随选项，则视为只附加-s 选项。			# 	Linux
	-a, 	--all		以如下次序输出所有信息。其中若-p 和 -i 的探测结果不可知则被省略：	# -s 	Linux 
													  -n	linux 
													  -r	4.10.0-19-generic 
													  -v	#21-Ubuntu SMP Thu Apr 6 17:04:57 UTC 2017 
													  -m	x86_64 
													  -p	x86_64 
													  -i	x86_64 
													  -o	GNU/Linux
  	-s, 	--kernel-name		输出内核名称							#
  	-n, 	--nodename		输出网络节点上的主机名
  	-r, 	--kernel-release		输出内核发行号
  	-v, 	--kernel-version     	print the kernel version
  	-m, 	--machine            	print the machine hardware name
  	-p, 	--processor          	print the processor type (non-portable)
  	-i, 	--hardware-platform  	print the hardware platform (non-portable)
  	-o, 	--operating-system   	print the operating system
      		--help			显示此帮助信息并退出
      		--version			显示版本信息并退出

Full documentation at: <http://www.gnu.org/software/coreutils/uname>


