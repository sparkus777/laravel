start:
	docker-compose up -d

stop:
	docker-compose down

exec:
	docker-compose exec app /bin/bash
