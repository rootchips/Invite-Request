User Invitation Systems using Mailable - Laravel 5.4.16
==============

Imagine you build a CMS then you need to send user an invitation to their email for get full access of your account.

### Step 1 : Migration
Type this on your Terminal/CLI.
```
php artisan make:migration creates_invite_table
```
Make a migration for Invite Table and you need to write some schema.

### Step 2 : Invite table schema & Fix user table schema
Write some column & datatype for Invite table. Project/database/migrations/xx_xx_xx_creates_invite_table.php
```php
public function up()
    {
        Schema::create('invite', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('token', 16)->unique();
            $table->timestamps();
        });
    }
public function down()
	{
		Schema::drop('invite');
	}
```
Delete name and password in user table schema. Project/database/migrations/xx_xx_xx_xx_creates_users_table.php
```php
public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }
   ```



