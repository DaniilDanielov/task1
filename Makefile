build: docker-build docker-init
rebuild: docker-down docker-prune docker-build docker-init
init: cdu docker-init
du: cdu docker-up
dd: cdu docker-down

cdu:
	 docker-compose exec app -u $USER composer du || true

docker-down: cdu
	docker-compose down --remove-orphans || true

docker-up: cdu
	docker-compose up -d

docker-build: cdu
	docker-compose build

docker-init: cdu
	docker-compose down
	docker-compose up -d
	docker-compose exec app composer i -o --no-interaction --ignore-platform-reqs

docker-prune:
	docker-compose rm -fsv
