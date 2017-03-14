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
                          `started` TIMESTAMP default NULL,
                          `finished` TIMESTAMP default NULL,
                          PRIMARY KEY (id)
             );

/*FetchLog*/CREATE TABLE fetchlog
             (
                          `id`           INT auto_increment NOT NULL,
                          `recordsadded` INT NOT NULL DEFAULT 0,
                          `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          `source`       INT NOT NULL,
                          FOREIGN KEY fk_fl_src (source) references queue(id),
                          PRIMARY KEY ( id )
             );
