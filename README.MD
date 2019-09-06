# Readme

php >= 7.3

[Read vs code sync config](https://itnext.io/settings-sync-with-vs-code-c3d4f126989)


```bash
  # Clone repository
  git clone https://github.com/devlegacy/api-oasis-primera-fase.git

  # change directory to api-oasis-primera-fase
  cd ./api-oasis-primera-fase

  # Load database
  mysql -u root -p < ./database/onow_2019-05-24.sql

  # Install dependencies
  composer install

  # Create .env config file
  touch .env
```

```shell
# .env database example configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=oasis_primera_fase
DB_USERNAME=root
DB_PASSWORD=
```
