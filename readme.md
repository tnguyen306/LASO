#### This Should be in line with what's on the server

##To do that...

git remote add live ssh://lasoadmin@lasosearch.com/~/gitlive/LASO

add and commit as normal

git push live lasosearch_server

And your changes are pushed to the server; how nice!

#### General Readme Stuff

## Using

To host, go to this folder, and run "php artisan host"

To prepare a database for migration, use the "pre_eloquent_migration.sql" file on the target databse.

To migrate database, change config/database accordingly, then from this folder, run "php artisan migrate"

To update databse, go to this folder and run "php artisan db:seed"

Running migrate or seed ending with "--force" skips the production prompt.

Currently, this application is configured for use with mysql.

###TODO

Fix Memory Leak in difference?

### Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
