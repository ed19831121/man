Usage: split [OPTION]... [FILE [PREFIX]]		Output pieces of FILE to PREFIXaa, PREFIXab, ...; default size is 1000 lines, and default PREFIX is 'x'.

如果没有指定文件，或者文件为"-"，则从标准输入读取。

必选参数对长短选项同时适用。
  -a, --suffix-length=N   		generate suffixes of length N (default 2)
      --additional-suffix=SUFFIX  	append an additional SUFFIX to file names
  -b, --bytes=SIZE        		put SIZE bytes per output file
  -C, --line-bytes=SIZE   		put at most SIZE bytes of records per output file
  -d                      		use numeric suffixes starting at 0, not alphabetic
      --numeric-suffixes[=FROM]  	same as -d, but allow setting the start value
  -e, --elide-empty-files  		do not generate empty output files with '-n'
      --filter=COMMAND    		write to shell COMMAND; file name is $FILE
  -l, --lines=NUMBER      		put NUMBER lines/records per output file
  -n, --number=CHUNKS     		generate CHUNKS output files; see explanation below
  -t, --separator=SEP     		use SEP instead of newline as the record separator; '\0' (zero) specifies the NUL character
  -u, --unbuffered        		immediately copy input to output with '-n r/...'
      --verbose				在每个输出文件打开前输出文件特征
      --help				显示此帮助信息并退出
      --version				显示版本信息并退出

The SIZE argument is an integer and optional unit (example: 10K is 10*1024).
Units are K,M,G,T,P,E,Z,Y (powers of 1024) or KB,MB,... (powers of 1000).

CHUNKS may be:
  N       split into N files based on size of input
  K/N     output Kth of N to stdout
  l/N     split into N files without splitting lines/records
  l/K/N   output Kth of N to stdout without splitting lines/records
  r/N     like 'l' but use round robin distribution
  r/K/N   likewise but only output Kth of N to stdout

