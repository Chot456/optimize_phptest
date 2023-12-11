# optimize_phptest

<h1>Code Optimization Summary</h1>

- Restructure directory
- Enhance class inheritance and minimize code redundancy by implementing namespaces, resulting in optimized     class hierarchy and reduced resource consumption
- Added DB_varibles to .ENV file for security purposes
- Added error handling and rollback for the DB transaction
- include Mysql PDO prepare statement for DB transactions to improve security
- Added return hint and documentation for every methods for maintainable purposes


<h1>Execute the following command to test it</h1>
Run the commnd within the Project directory to make new .env file
<pre>cp .env.example .env</pre>

To install the required packages using Composer, run the following command in your terminal or command prompt within the project directory:
<pre>composer install</pre>
