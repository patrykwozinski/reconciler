## Reconciler
Allows you to compare some data and react when it's different.

### How to install
```bash
composer.phar require patrykwozinski/reconciler
```


### How to use it
Prepare your `ComparatorFinder` with needed implementations and inject it into `Reconciliation` object. Everything together should be registered into runtime of your application (for example using Symfony Container).

When it's ready and you have `Reconciliation` in the container - just take it.

> Example
```php
<?php

use Docplanner\Reconciler\Reconciliation;

final class YourSuperService
{
    private Reconciliation $reconciliation;

    public function __construct(Reconciliation $reconciliation)
    {	    
        $this->reconciliation = $reconciliation;
    }

    public function doSomeStuff(): void
    {
        $firstObject = new stdClass;
        $secondObject = new stdClass;

        $diff = $this->reconciliation->compare($firstObject, $secondObject);
        
        // Optionally you can do something with Difference $diff :) 
    }
}
```

And that's all! :) Every needed reaction should be registered in `Reconciliation` service.
