    Binary executables with the setuid bit (chmod u+s path) can be executed with the privileges of the file's owner. Due to it's nature it should be used with care.

    In octal, the setuid bit is set with 4000 e.g: "chmod 4755 path".

    setuid has no effect if the user does not have execute permissions.

    setuid is represented with a lower-case "s" in the output of ls. In cases where it has no effect it is represented with an upper-case "S".

