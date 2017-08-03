    The sticky bit (chmod +t path) was introduced for use with executables as a way of telling an operating system to keep the text segment of the program in swap space after the process had terminated. This was a performance feature designed to make subsequent execution of the program faster.

    The sticky bit is more commonly used on directories where it allows the files or directories within to only be moved or deleted by that object's owner, the directory owner, or the super-user.

    In octal, the sticky bit is set with 1000 e.g: "chmod 1755 path".

    The sticky bit has no effect if other does not have execute permissions.

    The sticky bit is represented with a lower-case "t" in the output of ls. In cases where it has no effect it is represented with an upper-case "T".

