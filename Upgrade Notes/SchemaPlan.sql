/*User*/
CREATE TABLE user
             (
                          `id`          INT NOT NULL auto_increment,
                          `login`       VARCHAR(32) NOT NULL UNIQUE,
                          `email`       VARCHAR(64) NOT NULL UNIQUE,
                          `credentials` VARCHAR(64) NOT NULL,
                          `credtype`    VARCHAR(32) NOT NULL DEFAULT 'SHA256',
                          `apikey`      CHAR(64) NOT NULL UNIQUE,
                          PRIMARY KEY(id)
             );

/*Bill*/CREATE TABLE bill
             (
                          `state`   CHAR(2) NOT NULL,
                          `session` VARCHAR(16) NOT NULL,
                          `prefix`  VARCHAR(8) NOT NULL,
                          `number`  VARCHAR(16) NOT NULL,
                          /* number can include letters sometimes, so need varchar */
                          `revised` TIMESTAMP NOT NULL,
                          `authors` JSON,
                          `title` VARCHAR(128) NOT NULL,
                          /* Consider normalizing out text and title */
                          `text` TEXT,
                          /* Consider normalizing out text and title */
                          PRIMARY KEY(state,session,prefix,number,revised)
             );

/*State*/CREATE TABLE state
             (
                          `name`         VARCHAR(32) NOT NULL,
                          `abbreviation` CHAR(2) NOT NULL,
                          `apimethod`    VARCHAR(16) NOT NULL,
                          `options` JSON DEFAULT NULL,
                          /* options for render, search, and api */
                          PRIMARY KEY (`abbreviation`)
             );

/*Legislator*/CREATE TABLE legislator
             (
                          `name`  VARCHAR(64) NOT NULL,
                          `photo` VARCHAR(64),
                          `id` ,
                                    VARCHAR(32) NOT NULL,
                          `session` VARCHAR(16) NOT NULL `state` CHAR(2) NOT NULL,
                          `position` ,
                          FOREIGN KEY `state` REFERENCES state(abbreviation),
                          PRIMARY KEY (`state`, `session`, 'ID')
             );

/*Favorite*/CREATE TABLE favorite
             (
                          `owner`  INT NOT NULL,
                          `type`   VARCHAR(16) NOT NULL,
                          `id`     VARCHAR(32) NOT NULL,
                          `weight` INT NOT NULL DEFAULT 0,
                          FOREIGN KEY `owner` references user(id),
                          PRIMARY KEY (`owner`,`type`,`id`)
             );

/*Tag*/CREATE TABLE tag
             (
                          `owner`  INT NOT NULL,
                          `type`   VARCHAR(16) NOT NULL,
                          `id`     VARCHAR(32) NOT NULL,
                          `tag`    VARCHAR(32) NOT NULL DEFAULT 'Important',
                          `weight` INT NOT NULL DEFAULT 0,
                          FOREIGN KEY `owner` references user(id),
                          PRIMARY KEY (`owner`,`type`,`id`)
             );

/*Document*/CREATE TABLE document
             (
                          `id` INT auto_increment NOT NULL,
                          `revised` TIMESTAMP NOT NULL,
                          `owner` INT NOT NULL,
                          `permissions` JSON NOT NULL,
                          `title` TEXT NOT NULL,
                          /* Consider normalizing out text and title */
                          `text` VARCHAR(128),
                          /* Consider normalizing out text and title */
                          PRIMARY KEY(state,session,prefix,number,revised),
                          FOREIGN KEY `owner` references user(id)
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
