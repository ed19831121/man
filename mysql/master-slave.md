master	database	->	bin-log
slave	database	<-	relay-log

Mysql主从	允许从库版本高于主库，
但	      不允许主库版本高于从库。
---
主库/etc/my.cnf
server-id 	= 1            	# 1代表当前mysql为主库
log-bin		=mysql-bin      # bin-log文件命名格式
binlog-do-db	=mysql       	# 需要备份同步的数据库名
binlog-ignore-db=test   	# 不需要备份同步的数据库名
log-slave-updates        	# 自动更新mysql操作记录到二进制文件
slave-skip-errors        	# 遇到错误跳过，继续复制操作
				# 如果需要备份同步多个数据库的话，就多写几个binlog-do-db =  参数就可以了~

master>grant replication slave on *.* to slave@192.168.50.35 identified by ‘111111′;	# 新建一个用户名为slave，密码111111的用户，指定从库的IP地址为192.168.50.35
master>FLUSH TABLES WITH READ LOCK;	# 锁主库表，为一会的从库同步做准备
master>show master status;		# 记住 	File		和	Position，从库设置将会用到
				# 	mysql-bin.000001 	106
				#	MASTER_LOG_FILE		MASTER_LOG_POS
	
从库/etc/my.cnf
server-id = 2            	# 2代表当前mysql为从库
log-bin=mysql-bin        	# bin-log文件命名格式
binlog-do-db=mysql       	# 需要备份同步的数据库名
binlog-ignore-db=mysql   	# 不备份同步的数据库名
log-slave-updates        	# 自动更新mysql操作记录到二进制文件
slave-skip-errors        	# 遇到错误跳过，继续复制操作
				# 如果需要备份同步多个数据库的话，就多写几个binlog-do-db =  参数就可以了~

slave>stop slave;		#
slave>CHANGE MASTER TO 
	MASTER_HOST='192.168.50.30',
	MASTER_USER='slave',
	MASTER_PASSWORD='111111',
	MASTER_LOG_FILE='mysql-bin.000002',
	MASTER_LOG_POS=106;
slave>start slave;
slave>show slave status;

master>unlock tables;		# 最后解锁主库上的表：
