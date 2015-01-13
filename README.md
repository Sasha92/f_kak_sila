F_Kak_Sila

About

This is a very simple project on Symfony2. It allows to translate emails, web address or any english words to Russian.

Installation

1. Clone the example project from GitHub:
$ git clone https://github.com/Sasha92/f_kak_sila.git

2. Create database.

3. Install composer:
curl -sS https://getcomposer.org/installer | php
php composer.phar install

4. Update database:
app/console doctrine:schema:update --force

5. Load data into database:
app/console doctrine:fixtures:load
