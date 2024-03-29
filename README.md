<h1>Requirements</h1>
<ul>
    <li>Windows with WSL2 or any Linux distro</li>
    <li>Docker</li>
    <li>Composer installed globally</li>
    <li>Configured SSH key</li>
</ul>

<h1>Getting Started</h1>
<ol>
<li>Clone the repository</li>

``
git clone git@github.com:lebkowskih/articles.git
``

<li>Navigate to the project directory</li>

``
cd articles
``

<li>Install dependencies</li>

``
composer install
``

<li>Copy the .env.example file to .env</li>

``
cp .env.example .env
``

<li>Set database variables in .env</li>

``
DB_DATABASE=articles
DB_USERNAME=sail
DB_PASSWORD=password
``

<li>Generate application key:</li>

``
php artisan key:generate
``
<li>Start the Docker containers using Laravel Sail</li>

``
./vendor/bin/sail up -d
``

<li>Migrate all database and seed all data</li>

``
./vendor/bin/sail php artisan migrate:fresh --seed
``

<li>Install and start Vite</li>

``
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
``

<li>Access application at <a>http://localhost</a></li>
</ol>


<h1>Endpoints</h1>

| Method | URL                             | Description                                     |
|--------|---------------------------------|-------------------------------------------------|
| GET    | /api/articles/1                 | Retrieve post #1                                |
| GET    | /api/articles/author/{authorId} | Retrieve all posts created by author with id #1 |
| GET    | /api/authors/top-authors        | Retrieve top 3 authors that wrote the most articles last week.                         |


