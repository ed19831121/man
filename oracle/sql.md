1. 
CREATE 	USER 	user
IDENTIFIED {BY password | EXTERNALLY | GLOBALLY AS external name }
[DEFAULT 	TABLESPACE tablespace_name]
[TEMPORARY 	TABLESPACE tablespace_name]
[QUOTA {n {[K|M] | UNLIMITED } ON tablespace_name
 QUOTA {n {[k|M] | UNLIMITED } ON tablespace_name ... ]
[PASSWORD 	EXPIRE]
[ACCOUNT { LOCK | UNLOCK }]
[PROFILE { profile_name | DEFAULT }]
2. 
CREATE SEQUENCE [ schema. ]sequence
[ 
	{ 
		INCREMENT BY | 
		START WITH 
	} 	integer
   | { MAXVALUE integer | NOMAXVALUE }
   | { MINVALUE integer | NOMINVALUE }
   | { CYCLE | NOCYCLE }
   | { CACHE integer | NOCACHE }
   | { ORDER | NOORDER }
   ]
     [ { INCREMENT BY | START WITH } integer
     | { MAXVALUE integer | NOMAXVALUE }
     | { MINVALUE integer | NOMINVALUE }
     | { CYCLE | NOCYCLE }
     | { CACHE integer | NOCACHE }
     | { ORDER | NOORDER }
     ]... ;

---
CREATE 	SESSION                     创建会话
CREATE 	SEQUENCE                    创建序列
CREATE 	SYNONYM                     创建同名对象
CREATE 	TABLE                       在用户模式中创建表
CREATE 	ANY TABLE                   在任何模式中创建表
CREATE 	PROCEDURE                   创建存储过程
CREATE 	VIEW                        创建视图
CREATE 	USER                        创建用户
DROP 	TABLE                       在用户模式中删除表
DROP 	ANY TABLE                   在任何模式中删除表
DROP 	USER                        删除用户
EXECUTE ANY PROCEDURE               执行任何模式的存储过程
