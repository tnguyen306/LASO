/*errors*/
CREATE TABLE errors
             (
                          `id`    INT auto_increment NOT NULL,
                          `state` CHAR(2) NOT NULL,
                          `error` TEXT PRIMARY KEY ('Id')
             );

/*queue*/CREATE TABLE queue
             (
                          `priority` INT DEFAULT 0,
                          `state`    CHAR(2) NOT NULL,
                          `min`      VARCHAR(64),
                          `max`      VARCHAR(64),
                          PRIMARY KEY (state, min, max)
             );

/*FetchLog*/CREATE TABLE fetchlog
            (
                         `id`           INT auto_increment NOT NULL,
                         `recordsadded` INT NOT NULL DEFAULT 0,
                         `state`        CHAR ( 2 ) NOT NULL,
                         `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         `detail` TEXT,
                         FOREIGN KEY `state` references state ( abbreviation ) ,
                         PRIMARY KEY ( id )
            );
