# nova-text-currency 1.0.0
### Installation
```sh
$ composer require lathanhvien/nova-text-currency
```
### Usage
```sh
use Pifpif\NovaTextCurrency\Currency;

Currency::make('Total','total')->sign('8364'),
Or:
Currency::make('Total','total'),
```
### Configuration
Optional function sign create currency symbol, base on decimal currency symbol code.
It will show on 3 pages: Index, Detail, Form (edit or create)!
Example:
```sh
Currency::make('Total','total')->sign('8364'),
```
Will create Euro currency symbol.
You can use more currency symbol by reference [UTF-8 Currency Symbols](https://www.w3schools.com/charsets/ref_utf_currency.asp)

If just use Dollar symbol, use it by default:
```sh
Currency::make('Total','total'),
```
Or without any symbol, use it by this:
```sh
Currency::make('Total','total')->sign('32'),
```
### Support
If you have any ideas about this package, feel free to contact me at gmail: b.thanhdung@gmail.com or skype: xprotoprotox
### License
This package is available under the [MIT](https://opensource.org/licenses/mit-license.php) license. 