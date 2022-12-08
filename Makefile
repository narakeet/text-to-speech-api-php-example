DOCKER_IMAGE_NAME ?= php:7.4-cli
MAKE_DIR := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
DOCKER_RUN := docker run --rm -v $(MAKE_DIR):/work -w /work 
RUN := $(DOCKER_RUN) $(DOCKER_IMAGE_NAME)

run:
	$(RUN) php tts.php
