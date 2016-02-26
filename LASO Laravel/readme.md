## Using

To host, go to this folder, and run "php artisan host"

To prepare a database for migration, use the "pre_eloquent_migration.sql" file on the target databse.

To migrate database, change config/database accordingly, then from this folder, run "php artisan migrate"

To update databse, go to this folder and run "php artisan db:seed"

Running migrate or seed ending with "--force" skips the production prompt.

Currently, this application is configured for use with mysql.

###TODO

Allow Summary Inputs
Admin Functions

### Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
