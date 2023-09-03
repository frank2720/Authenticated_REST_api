<?php
//This a Seeder file that creates Person table and insert dummy data for testing.
require 'bootstrap.php';

$sql=<<<EOS
CREATE TABLE IF NOT EXISTS person (
    id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    firstparent_id INT DEFAULT NULL,
    secondparent_id INT DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (firstparent_id)
        REFERENCES person(id)
        ON DELETE SET NULL,
    FOREIGN KEY (secondparent_id)
        REFERENCES person(id)
        ON DELETE SET NULL
) ENGINE=INNODB;

INSERT INTO person
    (firstname, lastname, firstparent_id, secondparent_id)
VALUES
    ('Francis', 'Pudfra', null, null),
    ('Magnita', 'Jacobs', null, null),
    ('Elisha', 'Magenido', 1, 2),
    ('Jane', 'Smith', null, null);
EOS;

try{
    $stmt=$db_conn->prepare($sql);
    $stmt->execute();
    echo "Sucess";
}catch(PDOException $e){
    echo 'Failed '.$e->getMessage();
}