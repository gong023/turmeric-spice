turmeric-spice [![Build Status](https://travis-ci.org/gong023/turmeric-spice.svg?branch=master)](https://travis-ci.org/gong023/turmeric-spice) [![Coverage Status](https://coveralls.io/repos/gong023/turmeric-spice/badge.svg?branch=master&service=github)](https://coveralls.io/github/gong023/turmeric-spice?branch=master) [![Latest Stable Version](https://poser.pugx.org/gong023/turmeric-spice/v/stable)](https://packagist.org/packages/gong023/turmeric-spice)
=====================

TurmericSpice is a library inspired by [MagicSpice](https://github.com/gree/MagicSpice).

Give class syntax sugar for getter/setter.

# Installation

via composer

```
composer require gong023/turmeric-spice
```

# Basic Usage

Definition

```php

use TurmericSpice\ReadableAttributes;

class User
{
    use ReadableAttributes {
        mayHaveAsInt     as public getId;
        mayHaveAsString  as public getName;
        mayHaveAsFloat   as public getBalance;
        mayHaveAsBoolean as public getRestricted;
        mayHaveAsArray   as public getFriendIds;
    }
}
```

Instantiate and usage

```php
$user = new User([
    'id'         => 1,
    'name'       => 'Taro',
    'balance'    => 100.0,
    'restricted' => false,
    'friend_ids' => [2, 3, 4],
]);

$user->getId();        // 1
$user->getName();      // 'Taro'
$user->getBalance();   // 100.0
$user->getRestricted;  // false
$user->getFriendIds(); // [2, 3, 4]
$user->toArray();      // return array which contains above values.
```

If you want to use setter, Use `TurmericSpice\ReadWriteAttributes` trait.

```php

use TurmericSpice\ReadWriteAttributes;

class User
{
    use ReadWriteAttributes {
        setValue         as public setId;
        setValue         as public setName;
        mayHaveAsInt     as public getId;
        mustHaveAsString as public getName;
    }
}

$user = new User(['id' => null]);
$user->setId(1);
$user->getId(); // 1
$user->setName('Taro');
$user->getName(); // 'Taro'
```

# may or must

TurmericSpice has two dsl, `may` and `must`.

If nullable value is given at constructor, `may` casts specified type and `must` throws `\TurmericSpice\Container\InvalidAttributeException`.

```php
use TurmericSpice\ReadableAttributes;

class User
{
    use ReadableAttributes {
        mayHaveAsString   as public getName;
        mayHaveAsFloat    as public getBalance;
        mustHaveAsInt     as public getId;
        mustHaveAsArray   as public getFriendIds;
        mustHaveAsBoolean as public getRestricted;
    }
}

$user = new User([
    'name'       => null,
    'balance'    => 100,
    'id'         => null,
    'restricted' => 'false',
]);

$user->getName();       // return ''. casted automatically.
$user->getBalance();    // return 100.0. casted automatically.
$user->getId();         // If you give null(able),  you will get InvalidAttributeException.
$user->getFriendIds();  // If key is not defined, you will get InvalidAttributeException.
$user->getRestricted(); // return false. casted automatically.
```

# Advanced Usage

### Get raw value

```php
use TurmericSpice\ReadableAttributes;

class User
{
    use ReadableAttributes;
    
    public function getIdRaw()
    {
        return $this->attributes->mayHave('id')->value();
    }
    
    public function getRawArray()
    {
        return $this->attributes->getRaw();
    }
}

$user = new User(['id' => '1']);
$user->getIdRaw();    // return '1'.
$user->getRawArray(); // return ['id' => '1']
```

### Get as instance / instanceCollection

```php
use TurmericSpice\ReadableAttributes;

class User
{
    use ReadableAttributes;
    
    public function getCreated()
    {
        return $this->attributes->mayHave('created')->asInstanceOf('\\Datetime');
    }

    public function getUpdatedHistories()
    {
        return $this->attributes->mayHaveInstanceCollection('updated_histories', '\\Datetime');
    }
}

$user = new User([
    'created'           => '2015-01-01 00:00:00',
    'updated_histories' => ['2015-01-01 00:00:00', '2016-01-01 00:00:00'],
]);

$user->getCreated();          // return new Datetime('2015-01-01 00:00:00').
$user->getUpdatedHistories(); // return [new Datetime('2015-01-01 00:00:00'), new Datetime('2016-01-01 00:00:00')]
```

### Validation

```php
use TurmericSpice\ReadableAttributes;

class User
{
    use ReadableAttributes;
    
    public function getOneOrZero()
    {
        return $this->attributes->mayHave('id')->asInteger(function ($value) {
            return $value === 1;
        });
    }
    
    public function getOne()
    {
        return $this->attributes->mustHave('id')->asInteger(function ($value) {
            return $value === 1;
        });
    }
}

$user = new User(['id' => 2]);
$user->getOneOrZero(); // return 0.
$user->getOne();       // throws exception.
```

### More example

If you want to know more, [see Example and test cases](https://github.com/gong023/turmeric-spice/tree/master/tests/Example).

# IDE friendly

As with MagicSpice, TurmericSpice is also IDE friendly.

