<?php

namespace OpenClassrooms\Blog\Model;

abstract class Manager {
        // PDO object to access db
        private $db;
      
        // exec a sql request eventually parameterized
        protected function executeRequest($sql, $params = null) {
          if ($params == null) {
            $result = $this->getDb()->query($sql);    // direct execution
          }
          else {
            $result = $this->getDb()->prepare($sql);  // prepared request
            $result->execute($params);
          }
          return $result;
        }
      
        // Return a connection object to the db initializing the connexion if needed
        private function getDb() {
          if ($this->db == null) {
            // Creation of the connexion
            $this->db = new \PDO('mysql:host=localhost;dbname=writer_blog;charset=utf8', 'root', 'root');
          }
          return $this->db;
        }
      
    




}