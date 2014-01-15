php_hooks
=========

Simple hook class that provides whatever hooks you want.

Usage:
```php
//make a hooker
$hooker = new Hooker(array(
			"hook" => array(
					"callback"
				)
		));
//call a hook
$hooker->run("hook");
```
