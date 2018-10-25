# Custom Info

## About

This project contains the following features:

* Adds a new field Site Api Key
* Saves this field inside 'system.site' config file.
* Shows a message with the new value set in this field.
* Modifies 'Save Configuration' to 'Update Configuration'
* Adds a new route '/page_json/{siteApiKey}/{nid}', where
  'siteApiKey' is the value saved in Site Information form and
  'nid' is a valid node ID.


## General configuration
To get started, install the module as usual, hooks have been used,
JsonResponse, Controller created, Entity Api, etc.
Total time: 3 hours.
