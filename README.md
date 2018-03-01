# An SDK to easily work with the Notific API

This SDK lets you perform API calls to [Notific](https://notific.io).
API documentation [https://notific.io/api](https://notific.io/api)

## Usage

To install the SDK in your project you need to require the package via composer:

`$ composer require notific/notific-php-sdk`
 
Create an instance of the SDK:

```php
$notific = new Notific\PhpSdk\Notific(API_ID, API_TOKEN);
```  

If you don't have an API id yet, sign up at https://app.notific.io/signup

## Public notifications

You can get an array of public notification instances with `publicNotifications()` method.

```php
$notific->publicNotifications();
``` 

You can optionally give a page parameter to the method just like any other method that returns an array of items.

```php
$notific->publicNotifications(2);
``` 

Create new public notification.

```php
$notific->createPublicNotification([
    'title' => 'Welcome!'
    'body'  => 'This is the body of the notification...'
]);
``` 

Retrieve a public notification instance.

```php
$notification = $notific->publicNotification($id);
``` 

Update the notification.

```php
$notification->update([
  'title' => 'Boom!'
  'body'  => 'This is the updated body of the notification.'
]);
``` 

Delete the notification.

```php
$notification->delete();
``` 

## Recipients

You can get an array of recipient instances with `recipients()` method.

```php
$notific->recipients();
``` 

Create a recipient.

```php
$notific->createRecipient([
    'id'    => '123', // Unique identifier for the user. You can use integers, hashes or what ever suites you best.
    'name'  => 'Kung Fury',
    'email' => 'kung.fury@email.com'
]);
``` 

Retrieve a recipient instance.

```php
$recipient = $notific->recipient($id);
``` 

Update the recipient.

```php
$recipient = $recipient->update([
    'name'  => 'Fury'
]);
``` 

## Templates

Where private notifications are immutable and unnamed, templates are editable and easy to retrieve by name. 

You can get an array of template instances with `templates()` method.

```php
$notific->templates();
``` 

Create a template.

```php
$notific->createTemplate([
    'title' => 'Lorem ipsum dolor sit amet.',
    'body'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing...',
    'name' => 'lorem-ipsum'
]);
``` 

Retrieve a template with a name parameter.
```php
$template = $notific->template($name);
```

## Private notifications

You can get an array of private notification instances with `privateNotifications()` method.

```php
$notific->privateNotifications();
``` 

You can optionally give a page parameter to the method just like any other method that returns an array of items.

```php
$notific->privateNotifications(2);
``` 

Create new private notification.

```php
$notific->createPrivateNotification([
    'title' => 'Welcome!'
    'body'  => 'This is the body of the private notification...'
]);
``` 

Retrieve a private notification instance.

```php
$notification = $notific->privateNotification($id);
``` 

Update the private notification.

```php
$notification->update([
  'title' => 'Boom!'
  'body'  => 'This is the updated body of the private notification.'
]);
``` 

## Send private notifications

You can send either a private notification or a template to a single or multiple recipients.

Send private notification with the notification id and recipient(s) id. Recipients can be either a string or an array of id:s.

```php
$data = $notific->sendPrivateNotification($notificationId, $recipients);
``` 

Send private notification with private notification instance.

```php
$data = $notific->privateNotification($id)->sendTo($recipients);
``` 

Send private notification with recipient instance.

```php
$data = $notific->recipient($id)->sendNotification($notificationId);
``` 

## Security

If you discover any security related issues, please email kalle@klopal.com instead of using the issue tracker.

## Credits

- [Kalle Palokankare](https://github.com/palokankare)

This package uses code from and is greatly inspired by the [Oh Dear SDK package](https://github.com/ohdearapp/ohdear-php-sdk) which is inspired by the [Forge SDK package](https://github.com/themsaid/forge-sdk) by [Mohammed Said](https://github.com/themsaid).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
