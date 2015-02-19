# WP-Boilerplate

Tested on Wordpress 4.1

## Requirements

* [Git](http://git-scm.com/)
* [PHP](http://php.net/) 5.3+
* [MySQL](http://www.mysql.fr/) 5.5+
* [Node.js](http://nodejs.org/)
* [WP-CLI](http://wp-cli.org/)
* [wp server](https://github.com/wp-cli/server-command)

### Quick setup for OS X users

Install [Homebrew](http://brew.sh/) and run `brew doctor`. If everything seems OK, install the required packages with those commands:

```shell
brew tap homebrew/php
brew install git php mysql node wp-cli
```

Make sure MySQL's server is started with `mysql.server start`.

Install __wp server__ with the following commands (based [on this guide](https://github.com/wp-cli/wp-cli/wiki/Community-Packages#installing-a-package-without-composer)):

```shell
mkdir -p ~/.wp-cli/commands
git clone https://github.com/wp-cli/server-command.git ~/.wp-cli/commands/server
echo "require:\n  - commands/server/command.php" > ~/.wp-cli/config.yml
```

That's it!

## Installation

Open the `wp-project.json` file and fill in the `title`, `slug` and `database` properties:

```js
{
    "title": "My new project",
    "slug": "my-new-project",
    "database": "mynewproject",

    // ...
}
```

Then install the dependencies and run the installer:

```shell
npm install
npm run init
```

If the installation failed for any reason, just run `npm run clean` to rollback to the previous state. It doesn't cancel the created commit but if you reached this point there shouldn't be any issues that requires a rollback.

## Serve the project locally

```shell
cd public/
wp server
```
