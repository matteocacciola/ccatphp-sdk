# CheshireCat PHP SDK

----

**CheshireCat PHP SDK** is a library to help the implementation
of [Cheshire Cat](https://github.com/matteocacciola/cheshirecat-core) on a PHP Project

* [Installation](#installation)
* [Usage](#usage)

## Installation

To install CCatPHP-SDK you can run this command:
```cmd
composer require matteocacciola/cheshire-cat-php-sdk
```

Perhaps, you also need to add the following repositories to your composer.json file:
```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/matteocacciola/cheshire-cat-php-sdk"
        }
    ]
}
```

## Usage
Initialization and usage:

```php
use Albocode\CcatphpSdk\CCatClient;
use Albocode\CcatphpSdk\Clients\HttpClient;
use Albocode\CcatphpSdk\Clients\WSClient;


$cCatClient = new CCatClient(
new WSClient('cheshire_cat_core', 1865, null),
new HttpClient('cheshire_cat_core', 1865, null)
);
```
Send a message to the websocket:

```php
$notificationClosure = function (string $message) {
 // handle websocket notification, like chat token stream
}

// result is the result of the message
$result = $cCatClient->message()->sendWebsocketMessage(
new Message("Hello world!", 'user', []),  // message body
$notificationClosure // websocket notification closure handle
);

```

Load data to the rabbit hole:
```php
//file
$promise = $this->client->rabbitHole()->postFile($uploadedFile->getPathname(), null, null);
$promise->wait();

//url
$promise = $this->client->rabbitHole()->postWeb($url, null,null);
$promise->wait();
```

Memory management utilities:

```php
$this->client->memory()->getMemoryCollections(); // get number of vectors in the working memory
$this->client->memory()->getMemoryRecall("HELLO"); // recall memories by text

//delete memory points by metadata, like this example delete by source
$this->client->memory()->deleteMemoryPointsByMetadata(Collection.Declarative, ["source" => $url]);
```
