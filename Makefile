.PHONY: stan cs cbf decache doc help up

default: help

help: ## Help
	@grep -E '^[a-zA-Z_-]+:.*?##.*$$' $(MAKEFILE_LIST) | sort | awk '{split($$0, a, ":"); printf "\033[36m%-30s\033[0m %-30s %s\n", a[1], a[2], a[3]}'

stan: ## Runs phpstan.
	php vendor/bin/phpstan analyse --memory-limit=-1

cs: ## Runs phpcs.
	php vendor/bin/phpcs app routes database

cbf: ## Runs phpcbf.
	php vendor/bin/phpcbf app routes database

decache: ## Removes all cached files.
	rm -rf storage/framework/cache/data/*
	rm -rf storage/framework/sessions/*
	rm -rf storage/framework/views/*

doc: ## Generates documentation using phpdoc.
	php phpdoc

up: ## Start Docker containers.
	docker-compose up -d --build

migrate: ## Migrate and seed DB.
	docker exec -it pms_php_1 php artisan migrate:fresh --seed
