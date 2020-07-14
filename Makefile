default:
	docker exec -it app sh

run:
	docker-compose up

start: run
up: run

stop:
	docker-compose down

down: stop

build:
	docker-compose build


