# Bad Compnoent Dependency Example

Demonstrates an issue with loading depdenent component params via AJAX.

## Issues

A component has two dropdown properties: *foo* and *bar* with *bar* depending on *foo*.

* If *foo* retrieves its options through a `get*Options` method, the dropdown will appear blank by default when opening the component.
* If *foo* sets its options within the `defineProperties` property array using the `options` key, the dropdown will have its first option populated by default.
* If *foo* sets its options within the `defineProperties` property array using the `options` key, the *bar* dropdown will fail to populate even though an option is selected in *foo*.

## Steps to Replicate

* `git clone` to */plugins/flynsarmy/badcompdep*
* `php artisan plugin:refresh Flynsarmy.Badcompdep`
* Open any page in Backend - CMS
* Add this plugins *Without AJAX* and *With AJAX* components to the page and witness the inconsistent (and in the case of *With AJAX* broken) behavior.