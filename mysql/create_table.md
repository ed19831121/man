						the given name
1. CREATE [TEMPORARY] TABLE [IF NOT EXISTS] 	[`db_name`.]`tbl_name`	//	You must have the CREATE privilege for the table
    (create_definition,...)
    [table_options]
    [partition_options]

2. CREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name
    [(create_definition,...)]
    [table_options]
    [partition_options]
    [IGNORE | REPLACE]
    [AS] query_expression

3. CREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name    { LIKE old_tbl_name | (LIKE old_tbl_name) }

create_definition:
    col_name column_definition
  | [CONSTRAINT 	[symbol]] PRIMARY KEY 		[index_type] 			(index_col_name,...)      [index_option] ...
  | {INDEX|KEY} 					[index_name] 	[index_type] 	(index_col_name,...)      [index_option] ...
  | [CONSTRAINT 	[symbol]] UNIQUE  [INDEX|KEY]   [index_name] 	[index_type] 	(index_col_name,...)      [index_option] ...
  | {FULLTEXT|SPATIAL} 					[INDEX|KEY] 	[index_name] 	(index_col_name,...)      [index_option] ...
  | [CONSTRAINT 	[symbol]] FOREIGN KEY      	[index_name] 			(index_col_name,...) 	reference_definition
  | CHECK (expr)

column_definition:
    data_type 
	[NOT NULL | NULL] 
	[DEFAULT default_value]
      	[AUTO_INCREMENT] //applies only to integer and floating-point types
	[ 
		UNIQUE 	  [KEY] | 
	 	[PRIMARY] KEY
	]
      	[COMMENT 'string']
      	[COLUMN_FORMAT {FIXED|DYNAMIC|DEFAULT}]
      	[STORAGE {DISK|MEMORY|DEFAULT}]
      	[reference_definition]
  | data_type 
	[GENERATED ALWAYS] AS (expression)
      	[VIRTUAL | STORED] [UNIQUE [KEY]] 
	[COMMENT comment]
      	[NOT NULL | NULL] 
	[[PRIMARY] KEY]

data_type:
    BIT		[(length)]
  | TINYINT	[(length)] 		[UNSIGNED] [ZEROFILL]
  | SMALLINT	[(length)] 		[UNSIGNED] [ZEROFILL]
  | MEDIUMINT	[(length)] 		[UNSIGNED] [ZEROFILL]
  | INT		[(length)] 		[UNSIGNED] [ZEROFILL]
  | INTEGER	[(length)] 		[UNSIGNED] [ZEROFILL]
  | BIGINT	[(length)] 		[UNSIGNED] [ZEROFILL]
  | REAL	[(length,decimals)] 	[UNSIGNED] [ZEROFILL]
  | DOUBLE	[(length,decimals)] 	[UNSIGNED] [ZEROFILL]
  | FLOAT	[(length,decimals)] 	[UNSIGNED] [ZEROFILL]
  | DECIMAL	[(length[,decimals])] 	[UNSIGNED] [ZEROFILL]
  | NUMERIC	[(length[,decimals])] 	[UNSIGNED] [ZEROFILL]
  | DATE
  | TIME	[(fsp)]
  | TIMESTAMP	[(fsp)]
  | DATETIME	[(fsp)]
  | YEAR
  | CHAR	[(length)] 	[BINARY]	[CHARACTER SET charset_name] [COLLATE collation_name]
  | VARCHAR	(length) 	[BINARY]      	[CHARACTER SET charset_name] [COLLATE collation_name]
  | BINARY	[(length)]
  | VARBINARY	(length)
  | TINYBLOB
  | BLOB
  | MEDIUMBLOB
  | LONGBLOB
  | TINYTEXT 			[BINARY]	[CHARACTER SET charset_name] [COLLATE collation_name]
  | TEXT [BINARY]				[CHARACTER SET charset_name] [COLLATE collation_name]
  | MEDIUMTEXT [BINARY]				[CHARACTER SET charset_name] [COLLATE collation_name]
  | LONGTEXT [BINARY]				[CHARACTER SET charset_name] [COLLATE collation_name]
  | ENUM(value1,value2,value3,...)		[CHARACTER SET charset_name] [COLLATE collation_name]
  | SET(value1,value2,value3,...)		[CHARACTER SET charset_name] [COLLATE collation_name]
  | JSON
  | spatial_type

index_col_name:
    col_name [(length)] [ASC | DESC]

index_type:
    USING {BTREE | HASH}

index_option:
    KEY_BLOCK_SIZE [=] value
  | index_type
  | WITH PARSER parser_name
  | COMMENT 'string'

reference_definition:
    REFERENCES tbl_name (index_col_name,...)
      [MATCH FULL | MATCH PARTIAL | MATCH SIMPLE]
      [ON DELETE reference_option]
      [ON UPDATE reference_option]

reference_option:
    	RESTRICT 	| 
	CASCADE 	| 
	SET NULL 	| 
	NO ACTION 	| 
	SET DEFAULT

table_options:
    table_option [[,] table_option] ...

table_option:
    ENGINE 			[=] engine_name		//InnoDB(.idb), MyISAM(.MYD+.MYI), MEMORY, CSV, ARCHIVE, EXAMPLE, FEDERATED, HEAP,MERGE, NDB
  | AUTO_INCREMENT 		[=] value		//MyISAM, MEMORY, InnoDB, and ARCHIVE
  | AVG_ROW_LENGTH 		[=] value
  | [DEFAULT] CHARACTER SET 	[=] charset_name
  | CHECKSUM 			[=] {0 | 1}
  | [DEFAULT] COLLATE 		[=] collation_name
  | COMMENT 			[=] 'string'
  | COMPRESSION 		[=] {'ZLIB'|'LZ4'|'NONE'}
  | CONNECTION 			[=] 'connect_string'	//Spaces are not permitted within the quoted string. The string is case-insensitive
  | DATA  DIRECTORY 		[=] '/absolute/path/to/directory'	//InnoDB,MyISAM
  | INDEX DIRECTORY 		[=] '/absolute/path/to/directory'	//MyISAM		default-> the database directory
  | DELAY_KEY_WRITE 		[=] {0 | 1}
  | ENCRYPTION 			[=] {'Y' | 'N'}
  | INSERT_METHOD 		[=] { NO | FIRST | LAST }
  | KEY_BLOCK_SIZE 		[=] value
  | MAX_ROWS 			[=] value
  | MIN_ROWS 			[=] value
  | PACK_KEYS 			[=] {0 | 1 | DEFAULT}
  | PASSWORD 			[=] 'string'
  | ROW_FORMAT 			[=] {DEFAULT|DYNAMIC|FIXED|COMPRESSED|REDUNDANT|COMPACT}
  | STATS_AUTO_RECALC 		[=] {DEFAULT|0|1}
  | STATS_PERSISTENT 		[=] {DEFAULT|0|1}
  | STATS_SAMPLE_PAGES 		[=] value
  | TABLESPACE tablespace_name [STORAGE {DISK|MEMORY|DEFAULT}]
  | UNION 			[=] (tbl_name[,tbl_name]...)

partition_options:
    PARTITION BY
        { 
		[LINEAR] HASH(expr)	| 
		[LINEAR] KEY [ALGORITHM={1|2}] (column_list)  | 
		RANGE{
			(expr) 			| 
			COLUMNS(column_list)
		}		| 
		LIST{
			(expr) 	| 
			COLUMNS(column_list)
		} 
	}
    	[PARTITIONS num]
    	[
		SUBPARTITION BY
        	{ 
			[LINEAR] HASH(expr)        | 
			[LINEAR] KEY [ALGORITHM={1|2}] (column_list) 
		}
      		[SUBPARTITIONS num]
    	]
    	[
		(partition_definition 
		[, partition_definition] ...)
	]

partition_definition:
    PARTITION partition_name
        [
		VALUES
		{
			LESS THAN {
				(
					expr | 
					value_list
				) | 
				MAXVALUE
			}            |
            		IN (value_list)
		}

	]
        [
		[STORAGE] ENGINE 	[=] engine_name]
        	[COMMENT 		[=] 'comment_text' ]
        	[DATA DIRECTORY 	[=] 'data_dir']
        	[INDEX DIRECTORY 	[=] 'index_dir']
        	[MAX_ROWS 		[=] max_number_of_rows]
        	[MIN_ROWS 		[=] min_number_of_rows]
        	[TABLESPACE 		[=] tablespace_name]
        	[(subpartition_definition [, subpartition_definition] ...)]

subpartition_definition:
    	SUBPARTITION logical_name
        [[STORAGE] ENGINE 	[=] engine_name]
        [COMMENT 		[=] 'comment_text' ]
        [DATA DIRECTORY 	[=] 'data_dir']
        [INDEX DIRECTORY 	[=] 'index_dir']
        [MAX_ROWS 		[=] max_number_of_rows]
        [MIN_ROWS 		[=] min_number_of_rows]
        [TABLESPACE 		[=] tablespace_name]

query_expression:
    SELECT ...   (Some valid select or union statement)
---
1. CREATE TABLE new_tbl LIKE orig_tbl;
2. CREATE TABLE new_tbl AS   SELECT * FROM orig_tbl;
3. CREATE TABLE test (blob_col BLOB, INDEX(blob_col(10)));
4. CREATE TABLE t1 (
	c1 INT STORAGE DISK,
	c2 INT STORAGE MEMORY
) TABLESPACE ts_1 ENGINE NDB;

5. CREATE TABLE tk  (col1 INT, col2 CHAR(5), col3 DATE)
	PARTITION  BY KEY(col3)
	PARTITIONS 4;

6. CREATE TABLE t1 (
    year_col  INT,
    some_data INT
)
PARTITION BY RANGE (year_col) (
    PARTITION p0 VALUES LESS THAN (1991),
    PARTITION p1 VALUES LESS THAN (1995),
    PARTITION p2 VALUES LESS THAN (1999),
    PARTITION p3 VALUES LESS THAN (2002),
    PARTITION p4 VALUES LESS THAN (2006),
    PARTITION p5 VALUES LESS THAN MAXVALUE
);
7. CREATE TABLE th (id INT, name VARCHAR(30), adate DATE)
	PARTITION BY LIST(YEAR(adate))
(
  PARTITION p1999 VALUES IN (1995, 1999, 2003)    DATA DIRECTORY = '/var/appdata/95/data'    INDEX DIRECTORY = '/var/appdata/95/idx',
  PARTITION p2000 VALUES IN (1996, 2000, 2004)    DATA DIRECTORY = '/var/appdata/96/data'    INDEX DIRECTORY = '/var/appdata/96/idx',
  PARTITION p2001 VALUES IN (1997, 2001, 2005)    DATA DIRECTORY = '/var/appdata/97/data'    INDEX DIRECTORY = '/var/appdata/97/idx',
  PARTITION p2002 VALUES IN (1998, 2002, 2006)    DATA DIRECTORY = '/var/appdata/98/data'    INDEX DIRECTORY = '/var/appdata/98/idx'
);

Partitions can be 
	modified, 
	merged, 
	added 	to tables, and 
	dropped from tables

