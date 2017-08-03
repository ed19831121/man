    Binary executables with the setgid bit (chmod g+s path) can be executed with the privileges of the file's group.

    A useful property is to set the setgid bit on a directory so that all files and directories newly created within it inherit the group from that directory.

    In octal, the setgid bit is represented by 2000 e.g: "chmod 2755 path".

    setgid has no effect if the group does not have execute permissions.

    setgid is represented with a lower-case "s" in the output of ls. In cases where it has no effect it is represented with an upper-case "S".

