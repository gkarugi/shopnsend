# Project set up

- create database and set env vars
- run php artisan migrate to set up the database tables
- run php artisan roles:update to update role definitions
- run php artisan administrator:create to create admin account
- set ipay credentials in the env file, ipay config is contained in services.php. sam has the credentials
- admin and store dashboards are at <project_url>/dashboard
- login with admin account to add stores and set up categories etc.
- store can login after admin has created their accounts to create product items and product groupings

-remmember to set up africas talking env vars to make sure texts are sent. see services.php config file. you can use sandbox app for testing
-remmember to set up email driver in the env var to accept emails
