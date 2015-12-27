# L5 Computer Shop

Web computer shop built in [Laravel 5](http://laravel.com), including Excel spreadsheet import and Stripe payment.

## Excel spreadsheet import

Excel spreadsheet has following columns: id, Name, Manufacturer, Model, Category, Price, Processor, Memory, HDD, Graphics, Screen, Optical. Example file can be found inside the repository.

## Stripe payment

use testing card: 4242 4242 4242 4242, Expiry date: some date in future. CVC: 4242.

## Local Instalation
Clone the repo and cd into the directory, then run composer install form the command line. The App uses sqlite in development enviroment.
Run inside homestead enviroment.

Admin credentials

	admin@l5shop.com
	123456