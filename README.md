# Bad Compnoent Dependency Example

Demonstrates an issue with loading depdenent component params via AJAX.

## Issues

A component has two dropdown properties: *foo* and *bar* with *bar* depending on *foo*.

* If *foo* retrieves its options through a `get*Options` method, the dropdown will appear blank by default when opening the component (See *Options Method* component below).
* If *foo* sets its options within the `defineProperties` property array using the `options` key, the dropdown will have its first option populated by default (See *Options Array* component below).
* If *foo* sets its options within the `defineProperties` property array using the `options` key, the *bar* dropdown will fail to populate even though an option is selected in *foo*.
  * If you change *foo* option then change it back, *bar* will populate correctly
  * If you close and re-open the component, *bar* will populate correctly
  * If *foo* only has 1 option and *bar* is set to `required`, there is no way to close and re-open the component and your only option is to reload the page (See *Single Options Method* component below).

## Steps to Replicate

* `git clone` to */plugins/flynsarmy/badcompdep*
* `php artisan plugin:refresh Flynsarmy.Badcompdep`
* Open any page in Backend - CMS
* Add this plugins *Options Method* and *Options Array* and *Single Option Method* components to the page and witness the inconsistent (and in the case of *Single Options Method* broken) behavior.