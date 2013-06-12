MySQL Migration Wrapper for CodeIgniter
=========================================
Open Source Class

Installation
------------
1 - Copy and paste mymigration.php file insede of migrations folder
2 - Then your migrations class need to extends to MyMigration class

Supported Features
------------
1. MySQL innodb tables, to make a table Innodb you need colocate
    an innodb => TRUE in config array
2. MySQL unique fields, to make a field unique you need to colocate
    an unique => TRUE in field config
3. MySQL primary key fields, to make a field unique you need to colocate
    an primary_key => TRUE in field config

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
            $id = array(
                'type' => 'int',
                'constraint' => 10,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => TRUE,
                'primary_key' => TRUE, //primary_key
            );
            $name = array(
                'type' => 'varchar',
                'constraint' => 40,
                'unique' => TRUE, //unique field
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
                'id' => $id,
                'name' => $name,
                'color' => $color,
                'flavor' => $flavor
            );
            $config = array(
                'table' => $this->table,
                'fields' => $fields,
                'innodb' => TRUE //InnoDB
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
* table validation si no viene, fields validations si no viene,
* foreign key
* unique
* charset to fields and table
* sql_extra
* your suggestions
* get database motor
