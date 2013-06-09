MySQL CodeIgniter Wrapper for CodeIgniter
=========================================
Open Source Class

Installation
------------
1 - Copy and paste mymigration.php file insede of migrations folder
2 - Then your migrations class need to extends to MyMigration class

Supported Features
------------
1 - MySQL innodb tables

Example - chocolate table
-------------------------
```php
<?php
    class 001_chocolate extends MyMigration {

        var $table;
        function __construct() {
            $this->table = 'chocolate';
        }

        function up() {

        }

        function down() {
            $this->dbforge->drop_table($this->table);
        }
    }
?>
```
Todo
-------------------------
* Other sql support
* foreign key
* unique
* charset
* sql_extra
* your suggestions
