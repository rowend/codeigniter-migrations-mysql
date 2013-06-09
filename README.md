MySQL CodeIgniter Wrapper for CodeIgniter
=========================================

Installation
------------
1 - Copy and paste mymigration.php file insede of migrations folder
2 - Then your migrations class need to extends to MyMigration class

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
