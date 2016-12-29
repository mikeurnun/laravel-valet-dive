# Quick dive into ["Laravel Valet"](https://laravel.com/docs/5.3/valet)
Simple loan request page using VueJS. This repo consists of 2 parts:..<br />
1. Laravel Valet environment<br />
2. <code>parkside</code> site directory

## 1. Installation steps in Terminal
#### This is least intrusive (i hope) to your local setup:
1. Download this repo: <code>git clone https://github.com/mikeurnun/laravel-valet-dive.git</code>
2. Navigate to downloaded directory: <code>cd laravel-valet-dive</code>
3. Install Laravel Valet dependencies: <code>composer update && composer install</code>
4. Install Valet: <code>./vendor/bin/valet install</code>
5. Link parkside site with Valet: <code>./vendor/bin/valet park</code>
6. Navigate to root of parkside site: <code>cd ./parkside</code>
7. Install front-end dependencies: <code>npm install</code>
8. Install back-end dependencies: <code>composer install</code>
9. Run: <code>gulp --production</code>

## 2. Establish Database Connection
1. Create a copy of <code>.env</code> file: <code>cp .env.example .env</code>
2. Using your database utility tool of choice (phpMyAdmin, Sequel Pro, Mysql Workbench etc..), create a new database for parkside site
3. Open <code>.env</code> file in your IDE of choice and modify following lines with correct database credentials:
```javascript
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
4. Stage a new table in the database: <code>php artisan migrate:refresh</code>
5. Create & set new app key for parkside site: <code>php artisan key:generate</code>

**You should be all set, open up your browser & go to: http://parkside.dev**<br />
**Online DEMO: http://parkside.narmandakh.com/**

## Graceful uninstallation of everything above
- Stop Valet: <code>./vendor/bin/valet stop</code>
- Uninstall Valet: <code>./vendor/bin/valet uninstall</code>
- Remove database manually
- Delete `laravel-valet-dive` directory & that's it!
.<br />
..<br />
...<br />
..<br />
.<br />
- FYI, only thing Laravel Valet installs globally in your system is <code>dnsmasq</code> via <code>Homebrew</code>.
<br />If it's still there, simply run:
<code>brew uninstall dnsmasq</code>
