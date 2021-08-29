# AssetsPushBundle

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/braunstetter/assets-push-bundle/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/braunstetter/assets-push-bundle/?branch=main)
[![Build Status](https://app.travis-ci.com/Braunstetter/assets-push-bundle.svg?branch=main)](https://app.travis-ci.com/Braunstetter/assets-push-bundle)
[![Total Downloads](http://poser.pugx.org/braunstetter/assets-push-bundle/downloads)](https://packagist.org/packages/braunstetter/assets-push-bundle)
[![License](http://poser.pugx.org/braunstetter/assets-push-bundle/license)](https://packagist.org/packages/braunstetter/assets-push-bundle)

Push your assets from everywhere inside your templates into the `<head>`.

## Installation

`composer require braunstetter/assets-push-bundle`

## Usage

After the installation you can use the two tags from each template to register additional resources.

```html
{% css '/breadcrumbs.css' %}
{% js '/breadcrumbs.js' %}
```

After that you are able to query the assets with the `assets()` function.

It will give you an array of assets like that:

```php
[
    'css' => [
        '/breadcrumbs.css',
        '/custom.css',
        '/app.css',
    ],
    
    'js' => [
        '/breadcrumbs.js'
    ],
]
```

Now you can use this on top of your pages:

```html

<head>
    <meta charset="UTF-8">
    <title>{% block title %}Welcome!{% endblock %}</title>

    {% block metadata %}{% endblock %}
    
    {% block pushedJs deferred %}
    {% for asset in assets()['js'] %}
        <script src="{{ asset(asset) }}" defer></script>
    {% endfor %}
    {% endblock %}

    {% block pushedCSS deferred %}
    {% for asset in assets()['css'] %}
        <link rel="stylesheet" href="{{ asset(asset) }}">
    {% endfor %}
    {% endblock %}
</head>

```
