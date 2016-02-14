Gravatar API
==========

Endpoints
----------
* `/gravatr/{email}` returns Gravatar URL

3-rd Party Libraries
----------
* API is based on Symfony 3 framework.
* friendsofsymfony/rest-bundle - one of the most widely used libraries that simplifies REST API development in Symfony.

Possible Improvements
----------
* Add email validation in `/gravatr/{email}` and add corresponding test.

Scripts
----------
* bin/setup - deploys the application.
* bin/start - launches server. If `port` env variable is set, server will start listening on the port specified in this variable.
* bin/test - launches tests.