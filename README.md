For start app cd to /docker and run `docker-compose up`

Then go to "web" container and do some initial commands
- `php bin/console doctrine:migrations:migrate`
- `php bin/console doctrine:fixtures:load`

To test search use:
- `php bin/console app:search --filters=""`