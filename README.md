KnpMailjetBundle
=========

KnpMailjetBundle is a Symfony2 Bundle, mainly aimed at processing Mailjet [Event Tracking](https://www.mailjet.com/docs/event_tracking) API,
but also provides service initialization for [mailjet-api-php](https://github.com/KnpLabs/mailjet-api-php) library.

## Usage

### RESTful API as a service

Add api/secret keys in `config.yml` and it's up!

```yaml
# app/config.yml
knp_mailjet:
    api_key:    %mailjet_api_key%
    secret_key: %mailjet_secret_key%
```

Now you can access RESTful API via DIC by calling `knp_mailjet.api` service:

```php
<?php

$client = $this->container->get('knp_mailjet.api');
$userInfo = $client->get(RequestApi::USER_INFOS);

var_dump($userInfo);

//(
//    [username] => KnpLabs
//    [email] => hello@Knplabs.com
//    [locale] => en_US
//    [currency] => USD
//    [timezone] => America/New_York
//    [firstname] => KnpLabs
//    [lastname] =>
//    [company_name] => KnpLabs
//    [contact_phone] =>
//    [address_street] =>
//    [address_postal_code] =>
//    [address_city] =>
//    [address_country] =>
//    [tracking_openers] => 1
//    [tracking_clicks] => 1
//)
```

### Event Tracking Listener

`KnpMailjetBundle` handles [Event Tracking API](https://www.mailjet.com/docs/event_tracking) via EventListener service.

#### Configuring Mailjet

First, you need to provide Mailjet with a specific endpoint URL where all event callbacks will be sent.
To do this, go to [Event Tracking admin panel](https://www.mailjet.com/account/triggers):

![](http://i.imgur.com/iiRQN3Y.png)

> `KnpMailjetBundle` provides a helper command that you can use to quickly dump current endpoint URL:

```bash
$ php app/console mailjet:event-endpoint example.com
http://example.com/mailjet-event-api-endpoint
```

#### Configuring Event Listener

To actually handle events, you need to create your own Event Listener class by implementing provided interface `Knp\Bundle\MailjetBundle\Event\Listener\EventListenerInterface`:

```php
<?php

namespace Acme\DemoBundle\Listener;

use Knp\Bundle\MailjetBundle\Event\Listener\EventListenerInterface;

use Knp\Bundle\MailjetBundle\Event\Adapter\BlockedEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\BounceEvent;
// ...

class EventListener implements EventListenerInterface
{
    public function onOpenEvent(OpenEvent $event)
    {
        // handle open events here
    }

    public function onSpamEvent(SpamEvent $event)
    {
        // handle close events here
    }

    // ...
}
```

Now you need to configure it in DIC, but be sure to specify `knp_mailjet.event.listener` as parent service:

```yaml
    acme.demo.mailjet_listener:
        class:  Acme\DemoBundle\Listener\EventListener
        parent: knp_mailjet.event.listener
        arguments: []
```

And that's it, your endpoint is ready for Event Tracking API consumption!

### Securing Endpoint URL

It's a good idea to secure your endpoint URL with a special token that only you and Mailjet servers will know.
That way you will avoid people abusing it should they discover.

With `KnpMailjetBundle` it's really easy - just specify your desired token in `config.yml`:

```yaml
# app/config.yml
knp_mailjet:
    event_endpoint_token: 123token
```

And now if you run the helper command you will see the secured URL:

```bash
$ php app/console mailjet:event-endpoint example.com
http://example.com/mailjet-event-api-endpoint/123token
```

> Don't forget to update Mailjet admin panel with your new endpoint URL!

## Installation

The first step to use `KnpMailjetBundle` is to download Composer:

```bash
$ curl -s http://getcomposer.org/installer | php
```

Now add `KnpMailjetBundle` with Composer:

```bash
$ php composer.phar require knplabs/KnpMailjetBundle:*
```

And that's it! Composer will automatically handle the rest.

Alternatively, you can manually add the dependency to `composer.json` file...

```json
{
    "require": {
        "knplabs/KnpMailjetBundle": "*"
    },
    "minimum-stability": "dev"
}
```

... and then install our dependencies using:
```bash
$ php composer.phar install
```

After that, you need to update your `app/AppKernel.php` file:

```php
<?php
// app/AppKernel.php

use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Knp\Bundle\MailjetBundle\KnpMailjetBundle(),
        );
    }
}

For Event Tracking API you also need to import routing:

```yaml
# app/routing.yml

_knp_mailjet:
    resource: "@KnpMailjetBundle/Resources/config/routing.yml"

And that's it!

## Requirements

* PHP >= 5.3.8
* HTTP component of [Guzzle](http://guzzlephp.org/) library
* (optional) Symfony2 Debug Component

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) file.

## Running the Tests

#### TODO

## Credits

#### Sponsored by

[![KnpLabs Team](http://knplabs.pl/bundles/knpcorporate/images/logo.png)](http://knplabs.com)

## License

`KnpMailjetBundle` is released under the MIT License. See the bundled [LICENSE](LICENSE) file for
details.