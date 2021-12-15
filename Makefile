PWD = $(shell pwd -L)
DOCKER_RUN = docker container exec php81

update:
	- ${DOCKER_RUN} composer update

test:
	- ${DOCKER_RUN} composer test
