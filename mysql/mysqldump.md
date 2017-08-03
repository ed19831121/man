The mysqldump client utility 
	performs 
		logical backups, 
	producing 
		a set of SQL statements 
			that can be executed to 
	reproduce 
	the original 	database object definitions and 
			table 		data.

The mysqldump command 	can also generate output in 
	CSV, 
	other delimited text, or 
	XML format.

mysqldump requires at least 
	the 	SELECT privilege for dumped tables, 
		SHOW VIEW 	 for dumped views,
		TRIGGER 	 for dumped triggers, 
	and	LOCK TABLES if the --single-transaction option is not used.

To reload a dump file, you must have 
	the privileges required to execute the statements that it contains,
		such as the appropriate CREATE privileges for objects created by those statements.
mysqldump output can include ALTER DATABASE statements that change the database collation.
These may be used when dumping stored programs to preserve their character encodings. To reload a
dump file containing such statements, the ALTER privilege for the affected database is required.
