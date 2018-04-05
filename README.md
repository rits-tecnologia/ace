## Getting started

### Configuration

```bash
#!/bin/bash

# Require the package
composer require rits/ace @dev

# Publish inspinia assets
php artisan vendor:publish --tag=ace-assets

# Publish configuration file (optional)
php artisan vendor:publish --tag=ace-config

# Publish views (optional)
php artisan vendor:publish --tag=ace-views

# Publish translations (optional)
php artisan vendor:publish --tag=ace-trans
```

The package does not contain the inspinia's compiled styles nor scripts. You must require the inspinia assets from your application assets.

The main dependencies you must require before importing the ace's assets to your stylesheets are:

- `bootstrap@^3.3.7`
- `font-awesome@^4.7.0`
- `noty@^3.1.4`
- `jquery-slimscroll@^1.3.8`
- `metismenu@^2.7.2`

You may skip the `noty` dependency if you override the `ace::partials.notifications` view, otherwise you should install it so you can see the notifications.

After importing those dependencies you may import the newly created `resources/vendor/ace/scss/style.scss` file in your CSS.
