# Fork CMS Facebook module

This repository contains two modules:
1. FacebookConnector module
2. FacebookRatings module

FacebookConnector module
------

You need this module to establish an OAUTH connection with Facebook.

**Installation:**

### 1. Create a FB-app

Fill in the `Valid OAuth Redirect URIs`:

Example:
```
https://www.xxx.be/private/nl/facebook_connector/callback_from_facebook
```

Note:
* **Facebook App**
	* You do not need to fill in an app domain
	* You do not need to add a "platform"


### 2. Install the "Facebook connector" module in Fork CMS

* In your terminal, type: `composer require facebook/graph-sdk` to install the external library.
* Copy/paste the module to your site.
* Install the module in Fork CMS.
* Visit the module settings to make the facebook connection.

Note:
* **Buggy Facebook graph sdk version**: Do not use "facebook/graph-sdk" version "5.5" because it contains a bug which prevents you from successful executing "Facebook login".


FacebookRatings module
------

> This module can show your Facebook-page ratings.

Possible blocks:
- Ratings

Possible widgets:
- RatingsSliders

**Installation**

* Copy/paste this FacebookRatings module to your Fork CMS.
* Install the module in Fork CMS.
