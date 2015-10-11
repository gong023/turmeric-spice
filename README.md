turmeric-spice
=====================

TurmericSpice is a library inspired by [MagicSpice](https://github.com/gree/MagicSpice).

Give class syntax sugar for getter/setter.

# Installation

via composer

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

### may or must

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

### IDE friendly

As with MagicSpice, TurmericSpice is also IDE friendly.

### More example

If you want to know more, see Example and test cases.
