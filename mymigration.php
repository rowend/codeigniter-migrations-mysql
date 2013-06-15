<?php

    class MyMigration extends CI_Migration {

        function primary_key($fields=array()) {
            foreach ($fields as $key => $field) {
                if(isset($field['primary_key']) && $field['primary_key'] === TRUE) {
                    $this->dbforge->add_key($key, TRUE);
                }
            }
        }

        function innodb($config) {
            if(isset($config['innodb']) && $config['innodb'] === TRUE){
                $table = $config['table'];
                $sql = "ALTER TABLE  `$table` ENGINE = INNODB";
                $this->db->query($sql);
            }
        }

        function unique($table='', $fields=array(), ) {
            foreach ($fields as $key => $field) {
                if(isset($field['unique']) && $field['unique'] === TRUE) {
                    $sql = "ALTER TABLE
                                `$table`
                            ADD UNIQUE (`$key`)";
                    $this->db->query($sql);
                }
            }
        }

        function foreigns_keys($table, $fields=array()) {
            foreach ($fields as $key => $field) {
                $table_help = '$table'.'_ibfk';
                if(isset($field['foreign_key']) && $field['foreign_key']) {
                    $to_table = $field['foreign_key']['table'];
                    $to_field = $field['foreign_key']['field'];
                    $sql = "ALTER TABLE  `$table`
                            ADD CONSTRAINT `$table_help$key`
                            FOREIGN KEY (`$key`)
                            REFERENCES `$to_table` (`$to_field`)";
                    $this->db->query($sql);
                }
            }
        }

        function create_table() {
            $fields = $config['fields'];
            $table = $config['table'];
            $this->dbforge->add_field($fields);
            $this->primary_key($fields);
            $this->dbforge->create_table($table, TRUE);
            $this->innodb($config);
            $this->unique($table, $fields);
            $this->foreigns_keys($table, $fields);
        }

    }

?>
