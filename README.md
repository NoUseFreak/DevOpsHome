DevOps Home
===========

DevOps Home is a place to store and document all infrastructure information. It keeps all your documentation in a structured order.

Roadmap
-------

This project is and will be built in small sprints. The exact line-out of the project is not defined.
All new features can be found in the issue queue labeled by [feature+request](https://github.com/NoUseFreak/DevOpsHome/issues?labels=feature+request&state=open).

Before starting a new sprint, accepted features will be added to the milestone.

If you are missing a feature, please don't hesitate to create a new issue.

Installation
------------

1. Clone the repository
2. Install dependencies: `$ composer install`
3. Install front-end dependencies: `$ npm install`
4. Build js and css: `$ grunt build`
5. Run `$ bin/console doctrine:schema:create` to setup the database.
6. Create a VirtualHost with DocumentRoot pointing to web/ or run `$ bin/console server:run` for development.

You should now be able to access DoH.

Contributing
------------

> All code contributions - including those of people having commit access - must
> go through a pull request and approved by a core developer before being
> merged. This is to ensure proper review of all the code.
>
> Fork the project, create a feature branch, and send us a pull request.
>
> To ensure a consistent code base, you should make sure the code follows
> the [Coding Standards](http://symfony.com/doc/2.0/contributing/code/standards.html)
> which we borrowed from Symfony.
> Make sure to check out [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) as this will help you a lot.

If you would like to help, take a look at the [list of issues](http://github.com/NoUseFreak/DevOpsHome/issues).

Requirements
------------

PHP 5.3.2 or above

Author and contributors
-----------------------

Dries De Peuter - <dries@nousefreak.be> - <http://nousefreak.be>

See also the list of [contributors](https://github.com/NoUseFreak/DevOpsHome/contributors) who participated in this project.

License
-------

DevOps Home is licensed under the MIT license.
