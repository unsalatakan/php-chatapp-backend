
# CHATAPP BACKEND With PHP

Slim Microframework has been used.

Created simple REST API.

JSON has been used.


## Installation for MACOS

Install PHP using Homebrew by executing the following command:

```bash
brew install php
```
Download the Composer installer by executing the following command:

```bash
curl -sS https://composer.github.io/installer.sig
```
Verify the SHA-384 checksum of the installer:

```bash
php -r "if (hash_file('sha384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
```
Move the Composer executable to a directory in your PATH by executing the following command:

```bash
sudo mv composer.phar /usr/local/bin/composer
```
installing Slim and SQLite using Composer:
```bash
composer require slim/slim "^4.0"
composer require slim/psr7
composer require slim/psr7-factory
composer require ext-sqlite3
```
## USAGE

Start the built-in PHP server by running the following command in your terminal:
```bash
php -S localhost:8000
```
Then you can try the APIS with http connection:

GET MESSAGES:
```bash
http://localhost:8000/messages/1
```
![Ekran Resmi 2023-03-16 23 47 30](https://user-images.githubusercontent.com/45185182/225749166-7ed6357a-2c5c-46c4-a028-8d0cf57466ca.png)



GET USERS:
```bash
http://localhost:8000/users
```
![Ekran Resmi 2023-03-16 23 47 12](https://user-images.githubusercontent.com/45185182/225749139-077fdd65-08aa-47dc-85f2-0830e6e415c3.png)



