export ROOT_DIR=$(PWD)
export CURRENT_UID=$(shell id -u)
export CURRENT_GID=$(shell id -g)

install:
	cp .env.example .env
	docker run --rm -u=$(CURRENT_UID):$(CURRENT_GID) -v=$(ROOT_DIR):/app --workdir=/app composer:2.1 install
	./vendor/bin/sail up -d
	./vendor/bin/sail artisan migrate

test:
	./vendor/bin/sail artisan test

show-routes:
	./vendor/bin/sail artisan route:list --path api

