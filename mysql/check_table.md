CHECK 	TABLE 	tbl_name 	
		[, tbl_name] 	... 
		[option] 	...
			option = {
				FOR UPGRADE| 
				QUICK| 
				FAST| 
				MEDIUM| 
				EXTENDED| 
				CHANGED
			}
---
CHECK TABLE works for 
	InnoDB, 
	MyISAM, 
	ARCHIVE, and 
	CSV,
	partitioned tables 
tables.
---
