CSCE 5550.070
Summer 2021
Rimma Shilkina

README

File listing:

	AWS					- directory for files/directories copied to AWS server
	|------->no_access			- directory for _secret.php
		  |------->_secret.php	- php file for database connection parameters
	|------->add_user.php		- add users into the database
	|------->index.html			- index.html - redirects to user_login.php
	|------->user_login.php		- performs user authentication
	|------->	user_page.php		- shows a message after successful authentication
	project_db.mw				- MySQL Workbench file.Stores a model for the database
	sql_script.sql			- SQL script to create a database.
	README.txt				- this file

To replicate this project, you would need:
1.	Linux server with Apache2, PHP, and MySQL. Ubuntu 20.04 is recommended.
2.	Optional: install phpmyadmin to manage MySQL database.
3.	Use sql_script.sql to create a database.
4.	Use existing database user or create a new one. Grant insert, select permissions to the required user.
5.	Copy content of AWS folder into /var/www/html
6.	Run: sudo chown -R www-data /var/www/html
7.	Run: sudo chmod  -R 711 /var/www/html/no_access
8.	Run: sudo nano /var/www/html/no_access/_secret.php
9.	Modify and save username and password for the user in the point 4.
10.	Optional: configure Apache2 for TLS (you could use self-signed TLS certificates)
11.	Optional: configure Apache2 to automatically redirect HTTP to HTTPS
12. 	Use a browser and connect to the webserver and create users in the database: h[tt]p://your_server_url_or_IP/add_user.php
13. 	Use URL h[tt]p://your_server_url_or_IP/ to access user_login.php
14.	Use usernames and passwords (created at point 12) to test the Website. 
Note: Timeout for the user session is 1 minute. You would need to wait 1 minute before test another username and password.
Note: URLs fragmented to prevent auto execution. Remove brackets [] from URLs.
