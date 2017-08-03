#tnsnames.ora文件缺省放在/ORACLE_HOME/ product/8.1.7/network/admin目录下
RA817 = (						# 连接描述符名
	DESCRIPTION = (					# 描述
		ADDRESS_LIST = (			# 表示该客户机要经由多种协议与一台或多台服务器连接。
			ADDRESS = 
				(PROTOCOL 	= TCP)	# 在该样式文件中就表示该客户机要用TCP/IP协议来和服务器相连
				(HOST 		= sun62)# TCP/IP协议使用的服务器IP地址
				(PORT 		= 1521) # TCP/IP使用的端口地址
		)
	)
    	(
		CONNECT_DATA = (SERVICE_NAME = ora817.huawei.com) 	# “SERVICE_NAME”就是“GlobalDatabase Name”，
									# ORACLE8i数据库使用“GlobalDatabaseName”来唯一标识自己，
									# 通常的格式为“name.domain”，此处的值为“ora817.huawei.com”
    	)
)

INST1_HTTP = (
	DESCRIPTION = (
		ADDRESS_LIST = (
			ADDRESS = 					# 网络地址之一
				(PROTOCOL = TCP)	# 指明要连接使用的协议
				(HOST = sun62)		# 服务器IP地址
				(PORT = 1521) 		# 服务器端口号
		)
    	)
    	(
		CONNECT_DATA = 	(SERVER = SHARED)
      				(SERVICE_NAME = ora817.huawei.com)
      				(PRESENTATION = http://admin)
    )		
)

EXTPROC_CONNECTION_DATA = (
	DESCRIPTION = (
		ADDRESS_LIST = 
			(
				ADDRESS = (PROTOCOL = IPC)
					(KEY = EXTPROC))
    			)
    			(
				CONNECT_DATA =(SID = PLSExtProc)
      				(PRESENTATION = RO)
    			)
)

