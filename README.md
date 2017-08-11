# dishes-flow

Copyright © 2017 Jingyu Ye

Name: Jingyu Ye
email address:jingyu2*pdx.edu (please replace * with @)

Dishes Flow is a order tracking system for restaurants. It helps wait staff, cook, and cashier check the current order and the state of the order. Also, manager can use the statistics to understand the restaurant.

Dishes Flow is written in PHP and SQL. The front-end framework is Bootstrap 3.3.7.

This project is still in progress. Its functionality is not complete, and its design might be changed.

Environment:

Dishes-flow has been test on the environment below:

* PostgreSQL 9.5.7

* PHP 7.0.18-0ubuntu0.16.04.1

* Google Chrome 60.0.3112.90 desktop

Due to my accessibility to any environment, further testing is not planed. However, I would be glad if anyone told me about how this program works on their environment.

Usage:

To set up dishes-flow on your server, please follow the instructions below. Because this project is still in progress. the instructions and files may change:

1. As the pre-requirement, make sure that your machine has install PHP and any type of SQL database.

2. Copy the PHP file to your server and set the assign permission of all file to at lease rw-r--r--.

3. Execute SQL/SQL set up.txt on your SQL database. If you want to have some data for testing, you can also execute SQL/test_init.txt.

4. Open the PHP/login_info.php file and type your database login infomation.

5. Now you are free to go. The entrance of dishes-flow is PHP/index.html. Have fun.

Done:

* Wait staff menu

    table management
    
    Adding and change order in queue
    
    view order state( Partly)

* Cook menu

    receive order
    
    disable dishes on menu and 
    
    Add New desh to Menu
    
    
* Cashier menu

    view orders by group of customer
    
    caculation and printing receipt
    
    
To Do:

* user management and login system

* Wait staff menu

    table management
    
    view order state
    
* Cook menu
    
    request withdraw order
    
* Manager menu

    Cancel order
    
    Worker management
    
    statistics of dishes, ingredients, and table usage.
    
This work is under the MIT license. Please read the file LICENSE for license terms.
