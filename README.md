# Demo blog for yii2-multilingual package

This demo shows main features of [yii2-multilingual package](https://github.com/devgroup-ru/yii2-multilingual):

- multilingual URLs
- multilingual content
- hreflang tag
- language switcher

## Installation

```bash
vagrant up
vagrant ssh
cd /vagrant
composer install
./yii migrate --migrationPath=vendor/devgroup/yii2-deferred-tasks/src/migrations
./yii migrate
```

Now you can go to http://demo.yii2-multilingual.dev/ and test multilingual stuff.

For admin user password is 'admin'.
