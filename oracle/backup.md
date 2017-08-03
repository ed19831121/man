Oracle 11gR2 物理备库的搭建及切换
在同一台机器上搭建物理备用数据库的步骤

实验环境：Linux环境 Oracle 11.2.0.1

主库：orcl

备库：stby


1 检查监听是否启动

2 配置主备数据库的初始化参数文件
sqlplus "/as sysdba"
create pfile='/home/Oracle/initprim.ora' from spfile;
cp /home/oracle/initprim.ora /home/oracle/initstby.ora
vi /home/oracle/initprim.ora

orcl.__db_cache_size=104857600
orcl.__java_pool_size=4194304
orcl.__large_pool_size=4194304
orcl.__oracle_base='/oracle'#ORACLE_BASE set from environment
orcl.__pga_aggregate_target=155189248
orcl.__sga_target=268435456
orcl.__shared_io_pool_size=0
orcl.__shared_pool_size=142606336
orcl.__streams_pool_size=4194304
*.audit_file_dest='/oracle/admin/orcl/adump'
*.audit_trail='db'
*.compatible='11.2.0.0.0'
*.control_files='/oradata/orcl/control01.ctl','/oradata/flash_recovery_area/orcl/control02.ctl'
*.db_block_size=8192
*.db_domain=''
*.db_name='orcl'
*.db_recovery_file_dest='/oradata/flash_recovery_area'
*.db_recovery_file_dest_size=4039114752
*.diagnostic_dest='/oracle'
*.dispatchers='(PROTOCOL=TCP) (SERVICE=orclXDB)'
*.memory_target=422576128
*.open_cursors=300
*.processes=150
*.remote_login_passwordfile='EXCLUSIVE'
*.undo_tablespace='UNDOTBS1'

 

*.fal_client='prim'
*.fal_server='stby'
*.standby_file_management=auto
*.log_archive_dest_1='location=/oradata/arch/orcl valid_for=(all_logfiles,all_roles) db_unique_name=prim'
*.log_archive_dest_2='service=stby valid_for=(online_logfiles,primary_role) db_unique_name=stby'
*.DB_UNIQUE_NAME=prim
*.log_archive_config='dg_config=(prim,stby)'

 

编辑备库的参数文件:
vi /home/oracle/initstby.ora


stby.__db_cache_size=104857600
stby.__java_pool_size=4194304
stby.__large_pool_size=4194304
stby.__oracle_base='/oracle'#ORACLE_BASE set from environment
stby.__pga_aggregate_target=155189248
stby.__sga_target=268435456
stby.__shared_io_pool_size=0
stby.__shared_pool_size=142606336
stby.__streams_pool_size=4194304
*.audit_file_dest='/oracle/admin/stby/adump'
*.audit_trail='db'
*.compatible='11.2.0.0.0'
*.control_files='/oradata/stby/control01.ctl','/oradata/flash_recovery_area/stby/control02.ctl'
*.db_block_size=8192
*.db_domain=''
*.db_name='orcl'   --在同一台机器上搭建dg 要与主库的一样 否则ORA-01103
*.db_recovery_file_dest='/oradata/flash_recovery_area'
*.db_recovery_file_dest_size=4039114752
*.diagnostic_dest='/oracle'
*.dispatchers='(PROTOCOL=TCP) (SERVICE=stbyXDB)'
*.memory_target=622576128
*.open_cursors=300
*.processes=150
*.remote_login_passwordfile='EXCLUSIVE'
*.undo_tablespace='UNDOTBS1'


*.DB_FILE_NAME_CONVERT='/oradata/orcl','/oradata/stby'
*.LOG_FILE_NAME_CONVERT='/oradata/orcl','/oradata/stby'
*.fal_client='stby'
*.fal_server='prim'
*.standby_file_management=auto
*.log_archive_dest_1='location=/oradata/arch/stby valid_for=(all_logfiles,all_roles) db_unique_name=stby'
*.log_archive_dest_2='service=prim valid_for=(online_logfiles,primary_role) db_unique_name=prim'
*.DB_UNIQUE_NAME='stby'
*.log_archive_config='dg_config=(prim,stby)'

备份主库:
rman target /
backup database format '/u01/oradata/dbfull%U';
创建备库控制文件:
export Oracle_SID=orcl
sqlplus "/as sysdba"
alter database create standby controlfile as '/oradata/stby/stbycontrol.ctl';


cp /oradata/stby/stbycontrol.ctl /oradata/stby/control01.ctl
cp /oradata/stby/stbycontrol.ctl /oradata/flash_recovery_area/stby/control02.ctl

处理备库:
export ORACLE_SID=stby

orapwd file=/oracle/product/11.2.0/db_1/dbs/orapwstby password=oracle entries=5 ignorecase=y  --一定要加ignorecase=y 要不然归档传不到备用库上


sqlplus "/as sysdba"
startup nomount
alter database mount;

rman target /
restore database;

重启主库:
export ORACLE_SID=orcl
sqlplus "/as sysdba"
shutdown immediate
startup pfile='/home/oracle/initprim.ora'


配置tnsnames.ora（因为在同一台机器上，所以就改这一个文件）
orcl =
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SID = orcl)
      (SERVER = DEDICATED)
    )
  )

stby =
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SID = stby)
      (SERVER = DEDICATED)
    )
  )

 

将备库置于接收归档日志状态:
export ORACLE_SID=stby
sqlplus "/as sysdba"
alter database recover managed standby database disconnect from session;

 

过一会儿检查是否收到日志:
export ORACLE_SID=orcl
sqlplus "/as sysdba"
select max(sequence#) from v$archived_log;     --查看归档日志序列号
alter system switch logfile;
alter system switch logfile;

export ORACLE_SID=stby
sqlplus "/as sysdba"
select sequence#,applied from v$archived_log order by 1;    --查看归档日志序列号

主备库角色切换
角色切换:

SQL> SELECT SWITCHOVER_STATUS FROM V$DATABASE;			步骤1：验证主库能否进行角色切换，TO STANDBY表示可以进行
SWITCHOVER_STATUS
-----------------
TO STANDBY

 

SQL> ALTER DATABASE COMMIT TO SWITCHOVER TO PHYSICAL STANDBY;	步骤2：在主库上执行角色切换到从库角色


SQL> SHUTDOWN IMMEDIATE						步骤3：关闭并重新启动之前的主库实例
SQL> STARTUP MOUNT

 

SQL> SELECT SWITCHOVER_STATUS FROM V$DATABASE;			步骤4：在备库的V$DATABASE视图中查看备库的切换状态
SWITCHOVER_STATUS
-----------------
TO_PRIMARY

 

SQL> ALTER DATABASE COMMIT TO SWITCHOVER TO PRIMARY;		步骤5：切换备库到主库角色

 

步骤6：完成备库到主库的切换
1. 如果备库没有以只读模式打开，直接执行以下语句打开到新的主库。
SQL> ALTER DATABASE OPEN;

2. 如果备库以只读模式打开，先关闭数据，然后再重新启动。
SQL> SHUTDOWN IMMEDIATE;
SQL> STARTUP;

 

步骤7：如果有必要，重新启动一下新的备库上的重做日志应用服务
SQL> alter database recover managed standby database disconnect from session;
（注：可以通过select message from v$dataguard_status;查看当前备库应用重做日志的状态）


步骤8：开始发送重做数据到备库上
Issue the following statement on the new primary database:
SQL> ALTER SYSTEM SWITCH LOGFILE;


备注：
ALTER DATABASE RECOVER MANAGED STANDBY DATABASE USING CURRENT LOGFILE;

如果有缺失的归档日志文件，手工考背后，在备库上：
ALTER DATABASE REGISTER PHYSICAL LOGFILE 'filespec1';

FORCE 关键词终止目标物理备数据库上活动的RFS 进程，使得故障转移能不用等待网络连接超时而立即进行。
ALTER DATABASE RECOVER MANAGED STANDBY DATABASE FINISH FORCE;
