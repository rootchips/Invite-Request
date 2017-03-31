# Laravel 5 Simple User Invitation using Mailable
-----
<a name="item3"></a>
## Quick Start:

Clone this repository and install the dependencies.

    $ git clone https://github.com/rootchips/user-invitataion-mailable.git CUSTOM_DIRECTORY && cd CUSTOM_DIRECTORY
    $ composer install
    
Rename the `.env.example` to `.env`, then create a database and mail then edit the `.env` file.

    $ mv .env.example .env
    $ vi .env

Generate an application key and migrate the tables, then seed.

    $ php artisan key:generate
    $ php artisan migrate
    $ php artisan db:seed

Finally, serve the application.

    $ php artisan serve

Open [http://localhost:8000/invite](http://localhost:8000/invite) from your browser. 
To send user invitation, hit the link 
[http://localhost:8000/invite](http://localhost:8000/invite) from your browser.
You must send valid user's email address. 

## License

This is free software distributed under the terms of the MIT license

-----

