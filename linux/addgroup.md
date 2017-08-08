adduser 
	[--home  DIR] 
	[--shell SHELL] 
	[--no-create-home] 
	[--uid ID]
	[--firstuid 	ID] 
	[--lastuid 	ID] 
	[--gecos 	GECOS] 
	[--ingroup 	GROUP | --gid ID]
	[--disabled-password] 
	[--disabled-login] 
	[--encrypt-home] USER			添加普通用户

adduser 
	--system 
	[--home DIR] 
	[--shell SHELL] 
	[--no-create-home] 
	[--uid ID]
	[--gecos GECOS] 
	[--group | --ingroup GROUP | --gid ID] 
	[--disabled-password]
	[--disabled-login] USER			添加系统用户
adduser --group		[--gid ID] GROUP
addgroup 		[--gid ID] GROUP	添加用户组
addgroup --system 	[--gid ID] GROUP   	添加系统组
adduser USER GROUP				将已有的用户添加到已有的组
常规选项:
  --quiet | -q      不在标准输出显示处理消息
  --force-badname   允许不符合  NAME_REGEX[_SYSTEM] 配置选项
                                      设置的正则表达式的用户名
  --extrausers      使用其他用户数据库
  --help | -h       使用方法简介
  --version | -v    版本号及版权信息
  --conf | -c FILE  使用 FILE 作为配置文件
