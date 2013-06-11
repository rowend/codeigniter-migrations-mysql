<?php

    class MyMigration extends CI_Migration {

        function innodb($config) {
            if(isset($config['innodb']) && $config['innodb'] === TRUE){
                $table = $config['table'];
                $sql = "ALTER TABLE  `$table` ENGINE = INNODB";
                $this->db->query($sql);
            }
        }

        function unique($fields=array(), $table='') {
            foreach ($fields as $key => $field) {
                if(isset($field['unique']) && $field['unique'] === TRUE) {
                    $sql = "ALTER TABLE
                                `$table`
                            ADD UNIQUE (`$key`)";
                    $this->db->query($sql);
                }
            }
        }

        function create_table() {
            $fields = $config['fields'];
            $table = $config['table'];
            $this->dbforge->add_field($fields);
            $this->dbforge->create_table($table, TRUE);
            $this->innodb($config);
            $this->unique($fields, $table);
        }

    }

?>
