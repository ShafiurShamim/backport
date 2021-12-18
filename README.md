<p style="text-align:center; font-size:2rem;color:#FF2D20;">Backport::Simple Backend Management System <sup style="font-size:1rem;color:#d0d0d0;">beta</sup></p>
<p align="center">Powered by <a href="https://laravel.com">Laravel</a></p>

To run locally:

#. Clone the git repository::
    
    git clone https://github.com/ShafiurShamim/backport.git
    
    cd backport

#. Install dependencies::

    composer install

#. Rename `.env.example` to `.env` and generate application key

    php artisan key:generate

#. Configure MySQL database in the `.env` file

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=backport
    DB_USERNAME=root
    DB_PASSWORD=

#. Migration and Seed Admin data

    php artisan migrate
    php artisan db:seed

#. Run the server

    php artisan serve

#. To go backend `/manage/login`

    Username: super@backport.local
    Password: sp123456