<?php
    function get_types() {
        global $db;
        $query = 'SELECT * FROM types
                  ORDER BY typeID';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    function get_type_name($type_id) {
        global $db;
        $query = 'SELECT * FROM types
                  WHERE typeID = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $type_id);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['typeName'];
        return $type_name;
    }

    function delete_type($type_id) {
        global $db;
        $query = 'DELETE FROM types
                  WHERE typeID = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_type($type_id, $type_name) {
        global $db;
        $query = 'INSERT INTO types
                    (typeID, typeName)
                  VALUES
                    (:typeID, :typeName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $type_id);
        $statement->bindValue(':typeName', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }

?>