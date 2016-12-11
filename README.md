# PHP IMAP

### What is PHP IMAP?

Basically, it's an Object Oriented wrapper for [IMAP](http://php.net/manual/en/book.imap.php) library. 
It's meant to be used in a Object Oriented project and even supplies it's own 
dependency container ([Dependency Injection Symfony Component](https://github.com/symfony/dependency-injection))

This project uses SPL TYPES, because the forked project was for PHP prio to php7 and so there are 
no return types and scalar hints.
### Requirements

* [IMAP](http://php.net/manual/en/book.spl-types.php) extension.
* [SPL Types](http://php.net/manual/en/book.spl-types.php) extension.

### HOW TO USE

> Following examples are from my php-imap examples [repository](https://github.com/drakonli/php-imap-example)

1. Create a connection
2. Inject services into your Client (like [RepositoryInterface](https://github.com/drakonli/php-imap/blob/master/src/PhpImap/Mail/Repository/MailRepositoryInterface.php)). **All services** you can find [here](https://github.com/drakonli/php-imap/tree/master/src/PhpImap/Mail/Service) and their **dependency config** [here](https://github.com/drakonli/php-imap/blob/master/src/PhpImap/Dependency/Resources/configs/mail_services.yml).
3. Pass instantiated connection to services to do any kind of IMAP action.

Now, the most interesting part is how you create a connection. There are multiple ways to do so.
These ways differ depending on how you would like to instantiate the connection method and amount of knowledge you have
 about **flags**, **options** and **params** and their values.

1. If you don't know anything about them, you might just want to use **factories and builders** to create your own 
connection and connection config. And for that I recommend creating a **Factory** that implements 
[PreDefinedConnectionFactoryInterface](https://github.com/drakonli/php-imap/blob/master/src/PhpImap/Connection/Factory/PreDefined/PreDefinedConnectionFactoryInterface.php)
for **each service** you want to create IMAP connection to (because the connection settings are basically the same for 
one service - only login/password/mailbox are different). For example - Gmail.

  * Example here: [PreDefinedConnectionFactoryEmailDisplayer](https://github.com/drakonli/php-imap-example/blob/master/src/App/PreDefinedConnectionFactoryEmailDisplayer.php)
  * Services: [services.yml](https://github.com/drakonli/php-imap-example/blob/master/src/App/resources/configs/services.yml#L34-L64)

2. If you do know about them, use [dependency injection factory method](http://symfony.com/doc/current/service_container/factories.html) 
to create a connection and inject it straight into the client. For that you'll have to use [ConnectionFactoryInterface::createConnectionNonStrict](https://github.com/drakonli/php-imap/blob/master/src/PhpImap/Connection/Factory/ConnectionFactoryInterface.php#L57).
Mind that even though the interface is non-strict, internally SplTypes and the Flags-, Params-, Options- Collection is instantiated.

  * Example here: [ConnectionInjectedEmailDisplayer](https://github.com/drakonli/php-imap-example/blob/master/src/App/ConnectionInjectedEmailDisplayer.php)
  * Services: [services.yml](https://github.com/drakonli/php-imap-example/blob/master/src/App/resources/configs/services.yml#L66-L86)

3. You can also use [ConnectionFactoryInterface](https://github.com/drakonli/php-imap/blob/master/src/PhpImap/Connection/Factory/ConnectionFactoryInterface.php)
to create connection straight in the Client using strict (builders, factories, etc...) and non-strict (constants) syntax.
 **I advice not to do it!**, though:)

  1.
  * Example non-strict here: [NonStrictFactoryMethodEmailDisplayer](https://github.com/drakonli/php-imap-example/blob/master/src/App/NonStrictFactoryMethodEmailDisplayer.php)
  * Services: [services.yml](https://github.com/drakonli/php-imap-example/blob/master/src/App/resources/configs/services.yml#L10-L18)
  
  2.
  * Example with builders here: [BuildersEmailDisplayer](https://github.com/drakonli/php-imap-example/blob/master/src/App/BuildersEmailDisplayer.php)
  * Services: [services.yml](https://github.com/drakonli/php-imap-example/blob/master/src/App/resources/configs/services.yml#L20-L32)

And check out the [parameters.yml](https://github.com/drakonli/php-imap-example/blob/master/src/App/resources/configs/parameters.yml)
file - it will help you understand services configuration better.

Have fun:)
