# optimize_phptest

<h1>Code Optimization Summary</h1>

- Restructure directory
- Implement namspace to optimize the class inheritance and reduced resource consumption
- Added DB_varibles to .ENV file for security purposes
- Added error handling and rollback for the DB transaction
- include Mysql PDO prepare statement for DB transactions to improve security
- Added return hint and documentation for every methods for maintainable purposes

Run the commnd to make new .env file
<pre>cp .env .env.example</pre>

run the composer command to install the needed packages
<pre>composer install</pre># optimize_phptest
