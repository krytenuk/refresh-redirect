FwsRefreshRedirect
============

Docs available [online](https://www.freedomwebservices.net/zend-framework/fws-refresh-redirect).

I was inspired to write this simple module after using ZF flashMessanger controller plugin and view helper. The problem I found is when using the view helper the messages in flashMessanger are deleted, this means that if the user refreshes the page all messages are gone. This can possibly lead to errors depending on your code. To overcome this issue I wrote the refresh redirect module, this simply checks if the same page is called a second time, if so redirect to a different page.

Installation
------------

### Main Setup

#### By cloning project

1. Install the [FwsRefreshRedirect](https://github.com/krytenuk/refresh-redirect) ZF2 module
   by cloning it into `./vendor/`.
2. Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "krytenuk/refresh-redirect": "1.0.*"
    }
    ```

2. Now tell composer to download FwsRefreshRedirect by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

Enabling it in your `application.config.php` file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'FwsRefreshRedirect',
        ),
        // ...
    );
    ```

### Usage

Refresh Redirect is a controller plugin, when added to your controller actions, a page refresh will redirect to the specified route or url.

## Redirect to route

To redirect to a route use:

    ```php
     <?php
        $route = 'your/route';
        $params = array(); // your route params (optional)
        $options = array(); // your route options (optional)
        $reuseMatchedParams = FALSE; // reuse matched parameters (optional)
        $this->refreshRedirect($route, $params, $options, $reuseMatchedParams);
        // or use
        $this->refreshRedirect->toRoute($route, $params, $options, $reuseMatchedParams);

## Redirect to url

To redirect to a url use:

    ```php
    <?php
       $url = 'http://www.yourdomain.com';
       $this->refreshRedirect->toUrl($url);

See Zend Framework [redirect plugin](https://framework.zend.com/manual/2.0/en/modules/zend.mvc.plugins.html#the-redirect-plugin) for more info on the redirect parameters.