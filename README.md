KnpMailjetBundle
=========

KnpMailjetBundle is a Symfony2 Bundle, mainly aimed at processing Mailjet [Event Tracking](https://www.mailjet.com/docs/event_tracking) API,
but also provides service initialization for [mailjet-api-php](https://github.com/KnpLabs/mailjet-api-php) library.

[![Build Status](https://travis-ci.org/KnpLabs/KnpMailjetBundle.png?branch=master)](https://travis-ci.org/KnpLabs/KnpMailjetBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f52a11a7-4646-4a6e-8e40-72a59fa39650/mini.png)](https://insight.sensiolabs.com/projects/f52a11a7-4646-4a6e-8e40-72a59fa39650)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/KnpLabs/KnpMailjetBundle/badges/quality-score.png?s=98304706d5b454f88bfa524a22380e4dc3825129)](https://scrutinizer-ci.com/g/KnpLabs/KnpMailjetBundle/)
[![Latest Stable Version](https://poser.pugx.org/knplabs/knp-mailjet-bundle/version.png)](https://packagist.org/packages/knplabs/knp-mailjet-bundle)
[![Composer Downloads](https://poser.pugx.org/knplabs/knp-mailjet-bundle/d/total.png)](https://packagist.org/packages/knplabs/knp-mailjet-bundle)

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
//    ...
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

Now you need to configure it in DIC, but be sure to specify the tags you want to listen to:

```yaml
    acme.demo.mailjet_listener:
        class:  Acme\DemoBundle\Listener\EventListener
        tags:
            - { name: kernel.event_listener, event:  knp_mailjet.open,    method: onOpenEvent }
            - { name: kernel.event_listener, event:  knp_mailjet.blocked, method: onBlockedEvent }
            - { name: kernel.event_listener, event:  knp_mailjet.bounce,  method: onBounceEvent }
            - { name: kernel.event_listener, event:  knp_mailjet.click,   method: onClickEvent }
            - { name: kernel.event_listener, event:  knp_mailjet.spam,    method: onSpamEvent }
            - { name: kernel.event_listener, event:  knp_mailjet.typofix, method: onTypofixEvent }
            - { name: kernel.event_listener, event:  knp_mailjet.unsub,   method: onUnsubEvent }
        arguments: []

```

And that's it, your endpoint is ready for Event Tracking API consumption!

> If you don't know where to start with Event Listener implementation, take a look at the
> [demo listener](Event/Listener/EventListener.php) and [its configuration](Resources/config/event.yml#L16-#L28), which simply logs the events.

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
$ php composer.phar require knplabs/knp-mailjet-bundle:*
```

And that's it! Composer will automatically handle the rest.

Alternatively, you can manually add the dependency to `composer.json` file...

```json
{
    "require": {
        "knplabs/knp-mailjet-bundle": "*"
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
```

For Event Tracking API you also need to import routing:

```yaml
# app/routing.yml

_knp_mailjet:
    resource: "@KnpMailjetBundle/Resources/config/routing.yml"
```

And that's it!

## Requirements

* PHP >= 5.3.8
* knplabs/mailjet-api-php

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) file.

## Running the Tests

To run unit tests, you'll need a set of dev dependencies you can install using Composer:

```
php composer.phar install --dev
```

Once installed, just launch the following command:

```
./bin/phpspec
```

## Credits

#### Sponsored by

[![KnpLabs Team](http://knplabs.pl/bundles/knpcorporate/images/logo.png)](http://knplabs.com)

## License

`KnpMailjetBundle` is released under the MIT License. See the bundled [LICENSE](LICENSE) file for
details.
