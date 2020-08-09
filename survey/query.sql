CREATE DATABASE IF NOT EXISTS surveyDB;


CREATE TABLE IF NOT EXISTS survay(
    id SMALLINT (11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    _option VARCHAR(11) NOT NULL,
    votes  SMALLINT(11) NOT NULL DEFAULT 0,
    CHECK(votes>=0),
    CONSTRAINT uq_option UNIQUE (_option)
);



INSERT INTO survay(_option,votes) VALUES 
("C",6), 
("C++",19), 
("JAVA",25), 
("SWIFT",10),
("PYTHON",3);


RENAME TABLE survay TO survey;