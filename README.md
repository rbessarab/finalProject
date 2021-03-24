# finalProject
1. All databases and business logic were separated using MVC pattern. Classes, controller, model, views directories were added for clear structure.
2. Fat-free PHP framework was used as main engine for all routes and templating.
3. Data_Layer file contains all SQL queries with usign PDO and prepared statements to insert into database and show joint 2 related tables - customers and packages.
4. Data can be viewed on the Admin page (we joint 2 tables there to display all info needed). After customer submit the form, all data goes to customer table.
5. After adding new features and testing it, both of us regularly committed the code to github.
6. The whole application works with OOP approach. Controlling class regulates each route. Validation class contains all validation functions needed. Data layer class works with SQL queries and PDO prepared statements. Classes directory contains 4 classes needed for this application. Customer - basic customer with all information; Package - general package which is not used directly but helper for extending to other classes. Wedding package extends package and contains additional fields. Family package extends package and contains additional fields.
7. All code was documented, contains full Docblocks and follows PEAR standards. Each function has head comments and at least one comment inside.
8. Validation was added (but only with PHP), we did not use JavaScript validation.