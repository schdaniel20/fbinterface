<h1>Setup config files</h1>
In storage/app -> create a new folder: "facebookConfig"<br>

Here you must create 4 json files:
<ul>
<li>app.json</li>
<li>linkSource.json</li>
<li>parser.json</li>
<li>result.json</li>
</ul>

<h2>app.json</h2>
{<br>
    "id" : "facebook app id",<br>
    "secret" : "facebook app password",<br>
    "token" : "facebook app token",<br>
    "graph" : "facebook app version: v2.4"<br>
}<br>
<h2>linkSource.json</h2>
{<br>
    "table":"all_country_facebook",<br>
    "user":"user",<br>
    "password":"pass",<br>
    "dsn":"mysql:host=host;dbname=fb;charset=utf8"<br>
}<br>
<h2>parser.json</h2>
{<br>
    "table":"all_facebook_PROCESSED",<br>
    "user":"user",<br>
    "password":"pass",<br>
    "dsn":"mysql:host=host;dbname=fb;charset=utf8"<br>
}<br>
<h2>result.json</h2>
{<br>
    "table":"all_facebook_RESULTS",<br>
    "user":"user",<br>
    "password":"pass",<br>
    "dsn":"mysql:host=host;dbname=fb;charset=utf8"<br>
}<br>
<br>
<h1>Create/populate tables</h1>
In the application source directory there is a file named .env.example<br>
Create a file named .env and paste the content of the .env.example file in it.<br>
After that, open the .env file and change the following lines:
<ul>
<li>DB_HOST=localhost  to mysql server ip</li>
<li>DB_DATABASE=DB_NAME to database name</li>
<li>DB_USERNAME=user to an existing user</li>
<li>DB_PASSWORD=pass to a valid passoword</li>
</ul>
For example :<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=fb<br>
DB_USERNAME=root<br>
DB_PASSWORD=root<br>

When it is done, run these three commands in the application source directory:<br>
First : php artisan migrate<br>
<br>
In the console the following messages will appear:<br>
Migration table created successfully.<br>

Second: php artisan db:seed --class=CountriesTableSeeder<br>
Third: php artisan db:seed --class=FBStatusTableSeeder<br>
4th: php artisan db:seed --class=PermissionsTableSeeder<br>
5th: php artisan db:seed --class=UserTypeTableSeeder<br>
<br>
<br>
To start the facebook crawler service run the following command in the application source directory:<br>
php artisan queue:work --queue=crawler --tries=2
<br>
To start the facebook parser service run the following command in the application source directory:<br>
php artisan queue:work --queue=parser --tries=2


