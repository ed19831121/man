version: '3'
services:
  web:
    build: .				# can be specified either as a string containing a path to the build context 
    build:				# Or, as an object with the path specified under context and optionally Dockerfile and args:
      context: 	  ./dir			# Either a path to a directory containing a Dockerfile, 
					# or 	 a url  to a git repository.
      dockerfile: Dockerfile-alternate	# Compose will use an alternate file to build with. A build path must also be specified.
      args:
        buildno: 1  
  ports:
    - "5000:5000"
    volumes:
    - .:/code
    - logvolume01:/var/log
    links:
    - redis
  redis:
    image: redis
volumes:
  logvolume01: {}
