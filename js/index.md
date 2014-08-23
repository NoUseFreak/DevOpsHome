---
layout: default
title: DevOps Home
---

{% include homepage_gallery.html %}

## Features  

  - Documentation
    - Server specifications
    - How your infrastructure is layed out
  - Change logging
    - Log changes to servers

## Installation

DevOps Home requires PHP, MySQL and a webserver (nginx or apache).

To install from GitHub, clone the repository.

{% highlight bash %}
$ git clone git@github.com:NoUseFreak/DevOpsHome.git
$ cd DevOpsHome
{% endhighlight %}

Install the dependencies using composer.

{% highlight bash %}
$ composer install
{% endhighlight %}

Install front-end tools and dependencies.
{% highlight bash %}
$ npm install
$ grunt build
{% endhighlight %}

Create the database.
{% highlight bash %}
$ bin/console doctrine:schema:create
{% endhighlight %}

Create your admin user.
{% highlight bash %}
$ bin/console fos:user:create admin --super-admin
{% endhighlight %}

Create a VirtualHost with DocumentRoot pointing to web/ or run the build in development server.
{% highlight bash %}
$ bin/console server:run
{% endhighlight %}

## License
The DevOps Home code is free to use and distribute, under the MIT license.

This projects uses third-party libraries:

 - [Symfony](http://symfony.com/), licensed under [MIT](https://github.com/symfony/symfony/blob/master/LICENSE),
 - [Doctrine](http://www.doctrine-project.org/), licensed under [MIT](https://github.com/doctrine/doctrine2/blob/master/LICENSE),
 - [Twig](http://twig.sensiolabs.org/), licensed under [BSD License](https://github.com/fabpot/Twig/blob/master/LICENSE),
 - [KNP Markdown Bundle](https://github.com/KnpLabs/KnpMarkdownBundle), licensed under [MIT](https://github.com/KnpLabs/KnpMarkdownBundle/blob/master/LICENSE),
 - [FOS User Bundle](https://github.com/FriendsOfSymfony/FOSUserBundle), licensed under [MIT](https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/meta/LICENSE),
 - [ornicar Gravatar Bundle](https://github.com/ornicar/GravatarBundle), licensed under [MIT](https://github.com/ornicar/GravatarBundle/blob/master/LICENSE),
 - [Grunt](http://gruntjs.com/), licensed under [MIT](https://github.com/gruntjs/grunt/blob/master/LICENSE-MIT),
 - [Bower](http://bower.io/), licensed under [MIT](https://github.com/bower/bower/blob/master/LICENSE),
 - [Bootstrap](http://getbootstrap.com/), licensed under [MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE),
 - [Font Awesome](http://fortawesome.github.io/Font-Awesome/), licensed under [SIL Open Font License](http://scripts.sil.org/OFL) and [MIT](http://opensource.org/licenses/mit-license.html),
 - [Mousetrap](http://craig.is/killing/mice), licensed under [Apache 2.0 license](https://github.com/ccampbell/mousetrap/blob/master/README.md),
 - [Hightlightjs](https://highlightjs.org/), licensed under [BSD license](https://github.com/isagalaev/highlight.js/blob/master/LICENSE),
 - [Momentjs](http://momentjs.com/), licensed under [MIT](https://github.com/moment/moment/blob/develop/LICENSE),
 - [Select2](http://ivaynberg.github.io/select2/), licensed under [Apache License, Version 2.0](https://github.com/ivaynberg/select2/blob/master/LICENSE).


If you like the software, please help improving it by contributing PRs on the [GitHub project](https://github.com/NoUseFreak/DevOpsHome)!

## Support and Discussion

All support and discussions find place in the [issue queue](https://github.com/NoUseFreak/DevOpsHome/issues). 

## Roadmap

This project is and will be built in small sprints. The exact line-out of the project is not defined. All new features can be found in the issue queue labeled by [feature request](https://github.com/NoUseFreak/DevOpsHome/issues?labels=feature+request&state=open).

Before starting a new sprint, accepted features will be added to the milestone.

If you are missing a feature, please don't hesitate to create a new issue.

