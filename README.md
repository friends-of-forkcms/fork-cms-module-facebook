# Facebook module for Fork CMS

> The Facebook module lets you connect to Facebook and add ratings to your website.

**Download:**
* [Module for Fork CMS 5.*](https://github.com/friends-of-forkcms/fork-cms-module-facebook/archive/master.zip)
* [Module for Fork CMS 4.3.0](https://github.com/friends-of-forkcms/fork-cms-module-facebook/archive/1.0.0.zip)

**Features:**
* FacebookConnector module: Authenticating with Facebook
* FacebookRatings module: Ratings from your Facebook page

**Installation**

* Create a Facebook APP:
	* Fill in the `Valid OAuth Redirect URIs`, example: `https://www.xxx.be/private/nl/facebook_connector/callback_from_facebook`
	* You do not need to fill in an app domain
	* You do not need to add a "platform"
* In your terminal, type: `composer require facebook/graph-sdk` to install the external library.
* Download this module
* "Upload module" in your Fork CMS
* Install the module
* Visit the module settings to make the facebook connection.

Note:
* **Buggy Facebook graph sdk version**: Do not use "facebook/graph-sdk" version "5.5" because it contains a bug which prevents you from successful executing "Facebook login".

## Contributing

It would be great if you could help us improve the module. GitHub does a great job in managing collaboration by providing different tools, the only thing you need is a [GitHub](https://github.com/) login.

* Use **Pull requests** to add or update code
* **Issues** for bug reporting or code discussions

More info on how to work with GitHub on [help.github.com](https://help.github.com).

## License

The module is licensed under MIT. In short, this license allows you to do everything as long as the copyright statement stays present.
