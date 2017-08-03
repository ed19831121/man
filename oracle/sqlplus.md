1.sqlplus / as sysdba 		这是典型的操作系统认证，	不需要listener进程
2.sqlplus sys/oracle 		这种连接方式只能连接本机数据库，同样不需要listener进程
3.sqlplus sys/oracle@orcl 	这种方式需要listener进程处于可用状态。最普遍的通过网络连接。
