CREATE SERVER server_name
    FOREIGN DATA WRAPPER wrapper_name
    OPTIONS (option [, option] ...)

option:{ 
	HOST 		character-literal | 
	DATABASE 	character-literal | 
	USER 		character-literal | 
	PASSWORD 	character-literal | 
	SOCKET 		character-literal | 
	OWNER 		character-literal | 
	PORT 		numeric-literal 
}
