db_name = "51cto"  			一个数据库标识符，应与CREATE DATABASE 语句中指定的名称相对应。
instance_name = 51cto		在多个例程使用相同服务名的情况下，用来唯一地标识一个数据库例程。
INSTANCE_NAME				不应与 SID 混淆，它实际上是对在一台主机上共享内存的各个例程的唯一标识。
service_names = 51cto		为 Net8 监听程序可用于识别一个服务 (如:复制环境中的一个特定数据库) 的例程指定服务名。如果该服务没有域，将附加 DB_DOMAIN 参数。
control_files = (
	"/opt/apps/oracle/oradata/51cto/control01.ctl", 
	"/opt/apps/oracle/oradata/51cto/control02.ctl", 
	"/opt/apps/oracle/oradata/51cto/control03.ctl"
)
open_cursors = 320 		库高速缓存 指定一个会话一次可以打开的游标 (环境区域) 的最大数量，并且限制 PL/SQL 使用的 PL/SQL 游标高速缓存的大小，以避免用户再次执行语句时重新进行语法分析。请将该值设置得足够高，这样才能防止应用程序耗尽打开的游标。

max_enabled_roles 	= 32                
db_block_buffers 	= 5120		高速缓存与I/O    缓冲区高速缓存中 Oracle 块的数量。该参数会显著影响一个例程的 SGA 总大小。
shard_pool_size = 75497472
large_pool_size = 15728640		池--指定大存储池的分配堆，它可被多线程服务器 (MTS) 用作会话内存、用作并行执行的消息缓冲区以及用作 RMAN备份和恢复的磁盘 I/O 缓冲区
java_pool_size = 65536			字节为单位，指定Java存储池的大小，它用于存储Java的方法和类定义在共享内存中的表示法，以及在调用结束时移植到Java会话空间的Java对象
log_checkpoint_interval = 10000		指定在出现检查点之前，必须写入重做日志文件中的 OS 块 (而不是数据库块) 的数量。
					无论该值如何，在切换日志时都会出现检查点。较低的值可以缩短例程恢复所需的时间，但可能导致磁盘操作过量。
log_checkpoint_timeout = 1800		指定距下一个检查点出现的最大时间间隔 (秒数)。
					将该时间值指定为 0，将禁用以时间为基础的检查点。较低的值可以缩短例程恢复的时间，但可能导致磁盘操作过量
processes = 220
log_buffer = 8388608			以字节为单位，指定在 LGWR 将重做日志条目写入重做日志文件之前，用于缓存这些条目的内存量。
					重做条目保留对数据库块所作更改的一份记录。
					如果该值大于65536，就能减少重做日志文件 I/O，特别是在有长时间事务处理或大量事务处理的系统上  
					**最大值为 500K 或 128K * CPU_COUNT，两者之中取较大者
oracle_trace_enable = true 		启动一个默认的 Oracle Trace 集合，直到该值再次设置为 NULL。
sql_trace=false 			这些信息对改善性能很有用。由于使用 SQL 跟踪设备将引发系统开销，只应在需要优化信息的情况下使用 TRUE。
timed_statistics=true			收集操作系统的计时信息，这些信息可被用来优化数据库和 SQL语句。
					要防止因从操作系统请求时间而引起的开销，请将该值设置为零。将该值设置为 TRUE 对于查看长时间操作的进度也很有用。
background_dump_dest = /opt/apps/oracle/admin/51cto/bdump 
指定在 Oracle 操作过程中为后台进程 (LGWR，DBW n 等等) 写入跟踪文件的路径名(目录或磁盘)。它还定义记录着重要事件和消息的数据库预警文件的位置。
core_dump_dest = /opt/apps/oracle/admin/51cto/cdump 		指定核心转储位置的目录名 (用于 UNIX)。
resource_manager_plan = system_plan 				如果指定该值，资源管理器将激活计划和例程的所有子项 (子计划、指令和使用者组)。
								如果不指定，资源管理器将被禁用，但使用 ALTER SYSTEM 命令还可以启用。
user_dump_dest = /opt/apps/oracle/admin/51cto/udump		为服务器将以一个用户进程身份在其中写入调试跟踪文件的目录指定路径名。
								例如，该目录可这样设置: 
									NT 	操作系统上的 	C:/ORACLE/UTRC；
									UNIX 	操作系统上的 	/oracle/utrc；或 
									VMS 	操作系统上的	DISK$UR3:[ORACLE.UTRC]。
db_block_size = 8192						一个 Oracle 数据库块的大小 (以字节计)。
								该值在创建数据库时设置，而且此后无法更改。 1024 - 65536 (根据操作系统而定)。
remote_login_passwordfile = exclusive	指定操作系统或一个文件是否检查具有权限的用户的口令。
					如果设置为 NONE，Oracle 将忽略口令文件。
					如果设置为    EXCLUSIVE，将使用数据库的口令文件对每个具有权限的用户进行验证。
					如果设置为 SHARED，多个数据库将共享 SYS 和     INTERNAL 口令文件用户

os_authent_prefix = ""   		使用用户的操作系统帐户名和口令来验证连接到服务器的用户。
					该参数的值与各用户的操作系统帐户连接在一起。要去除 OS帐户前缀，请指定空值。
job_queue_processes = 4			只用于复制环境。它指定每个例程的 SNP 作业队列进程的数量 (SNP0, ... SNP9, SNPA, ... SNPZ)。
					要自动更新表快照或执行由 DBMS_JOB 创建的请求，请将该参数设置为 1 或更大的值。   0 到 36
job_queue_interval = 60  		作业队列 只用于复制环境。它以秒为单位指定该例程的每个 SNPn 后台进程的唤醒频率。  1 到 3600
distributed_transactions = 10  		一个数据库一次可参与的分布式事务处理的最大数量。如果由于网络故障异常频繁而减少该值，将造成大量未决事务处理。
open_links = 4				指定在一次会话中同时打开的与远程数据库的连接的最大数量。
					该值应等于或超过一个引用多个数据库的单个 SQL 语句中引用的数据库的数量，这样才能打开所有数据库以便执行该语句。
mts_dispatchers = "(protocol=TCP)(mul=ON)(tick=15)(pool=(in=2)(out=2))"  
					为设置使用多线程服务器的共享环境而设置调度程序的数量和类型。
					可以为该参数指定几种选项。
					这是字符串值的一个示例:“(PROTOCOL=TCP)(DISPATCHERS=3)”。
compatible = "8.1.0"			允许使用一个新的发行版，同时保证与先前版本的向后兼容性。
sort_area_size = 524288 		以字节为单位，指定排序所使用的最大内存量。
					排序完成后，各行将返回，并且内存将释放。
					增大该值可以提高大型排序的效率。
					如果超过了该内存量，将使用临时磁盘段。相当于 6 个数据库块的值 (最小值) 到操作系统确定的值 (最大值)。
sort_area_retained_size = 131072	以字节为单位，指定在一个排序运行完毕后保留的用户全局区 (UGA) 内存量的最大值。
					最后一行从排序空间中被提取后，该内存将被释放回 UGA，而不是释放给操作系统。
