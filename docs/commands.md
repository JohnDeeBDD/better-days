setup:

cd /var/www/html/test-harness && php test-harness.php --action=destroy --target=/var/www/html/wp-content/themes/better-days && php test-harness.php --action=bootstrap --no-cache --force --target=/var/www/html/wp-content/themes/better-days && cd /var/www/html/wp-content/themes/better-days && make build && make up && sleep 20 && cp /var/www/html/wp-content/themes/better-days/tests/better-days.wpunit.yml /var/www/html/wp-content/themes/better-days/tests/wpunit.suite.yml && cp /var/www/html/wp-content/themes/better-days/tests/better-days.StartupCept.php /var/www/html/wp-content/themes/better-days/tests/StartupCept.php && docker compose exec wordpress bash -c "cd /var/project && bash .devenv/start-chromedriver.sh && bin/codecept run acceptance /tests/StartupCept.php -vvv"


Run a test from outside the container:

docker compose exec wordpress bash -c "cd /var/project && bash .devenv/start-chromedriver.sh && bin/codecept run acceptance CenteredItemsCepts -vvv --html"

run a test from inside the container:

make shell
 - then -
cd /var/www/html/wp-content/themes/better-days && .devenv/start-chromedriver.sh && bin/codecept run acceptance CenteredItemsCepts -vvv --html