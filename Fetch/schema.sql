/*errors*/
CREATE TABLE errors
             (
                          `id`    INT auto_increment NOT NULL,
                          `state` CHAR(2) NOT NULL,
                          `error` TEXT PRIMARY KEY ('Id')
             );

/*queue*/CREATE TABLE queue
             (
                          `id`          INT auto_increment NOT NULL
                          `priority`    INT DEFAULT 0,
                          `state`       CHAR(2) NOT NULL,
                          `min`         VARCHAR(64),
                          `max`         VARCHAR(64),
                          `in_progress` CHAR(1),
                          PRIMARY KEY (id)
             );

/*FetchLog*/CREATE TABLE fetchlog
             (
                          `id`           INT auto_increment NOT NULL,
                          `recordsadded` INT NOT NULL DEFAULT 0,
                          `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          PRIMARY KEY ( id )
             );
