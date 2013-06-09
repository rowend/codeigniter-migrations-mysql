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
            $name = array(
                'type' => 'varchar',
                'constraint' => 40,
            );
            $color = array(
                'type' => 'varchar',
                'constraint' => 10,
            );
            $flavor = array(
                'type' => 'varchar',
                'constraint' => 10,
            );
            $fields = array(
                'name' => $name,
                'color' => $color,
                'flavor' => $flavor
            );
            $config = array(
                'table' => $this->table,
                'fields' => $fields,
                'innodb' => TRUE
            );
            $this->create_table($config);
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
* charset to fields and table
* sql_extra
* your suggestions
