DOCKER_COMPOSE = docker compose
EXEC_PHP = $(DOCKER_COMPOSE) exec php
COMPOSER = $(EXEC_PHP) composer

init: build up
	make -B vendor

build: ## Build les containers Docker
	$(DOCKER_COMPOSE) build --no-cache

up: ## Monte les containers Docker
	$(DOCKER_COMPOSE) up -d --remove-orphans

down: ## Démonte les containers Docker
	$(DOCKER_COMPOSE) down

stop: ## stop all containers
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) rm -v --force

bash: ## Permet d'accéder au bash du container PHP
	$(EXEC_PHP) bash


vendor: composer.lock
	$(COMPOSER) install -n

vendor-no-scripts:
	$(COMPOSER) install -n --no-scripts


