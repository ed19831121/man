
-v, --volume=[host-src:]container-dest[:<options>]: 	Bind mount a volume.
							The comma-delimited `options` are [rw|ro], [z|Z],
							[
								[r]shared	|
								[r]slave	|
								[r]private], and [nocopy].
The 'host-src' is an absolute path or a name value.

If neither 'rw' or 'ro' is specified then the volume is mounted in read-write mode.

The `nocopy` modes is used to disable automatic copying requested volume path in the container to the volume storage location.
For named volumes, `copy` is the default mode. Copy modes are not supported for bind-mounted volumes.

--volumes-from="":					Mount all volumes from the given container(s)

-u="", 	--user="": 	Sets the username or UID used and optionally the groupname or GID for the specified command.
	--user=[ 						root (id = 0) is the default user within a container
		user 		| 
		user:group 	| 
		uid 		| 
		uid: gid 	| 
		user:gid 	| 
		uid: group 
	]				
		NULL	group	gid
	user	√	√	√
	uid	√	√	√
-w="": 			Working directory inside the container	The default working directory for running binaries within a container is the root directory (/)
