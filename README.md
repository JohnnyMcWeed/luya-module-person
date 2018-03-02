# Person Module
 
The person module gives the possibility to add people to a Luya application. Therefore persons can be added in the backend, which get shown on the frontend afterwards.
 
## Installation

For the installation of modules Composer is required.

```sh
composer require johnnymcweed/luya-module-person:dev-master 
```

### Configuration

```php
return [
    'modules' => [
        // ...
        'person' => 'johnnymcweed\person\frontend\Module',
        'personadmin' => 'johnnymcweed\person\admin\Module',
        // ...
    ],
];
```

### Initialization 

After successfully installation and configuration run the migrate, import and setup command to initialize the module in your project.

1.) Migrate your database.

```sh
./vendor/bin/luya migrate
```

2.) Import the module and migrations into your LUYA project.

```sh
./vendor/bin/luya import
```

After adding the persmissions to your group you will be able to edit and add new people.

## Example Views

There are default views set up. Use these or create your own custom views.
