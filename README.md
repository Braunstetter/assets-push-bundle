# AssetsPushBundle

Push your assets from everywhere inside your templates into the `<head>`.

## Installation

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
