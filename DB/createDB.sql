 DROP DATABASE IF EXISTS boardgames_db;
 CREATE DATABASE boardgames_db;
 USE boardgames_db;
-- GRANT ALL PRIVILEGES ON EmployeeDB. * To ''@'localhost' .....

USE boardgames_db;


CREATE TABLE badge (
    badgeID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    badgeName               varchar(100) NULL, 
    badgeImage              varchar(255) NULL,
    badgeDescription        varchar(255) NULL
);

CREATE TABLE user (
    userID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName               varchar(100) NULL,
    prefix                  varchar(30) NULL,
    lastName                varchar(100) NULL,
    birthdate               date NULL,
    userImage               varchar(255) NULL,
    email                   varchar(255) NULL,
    realEmail               boolean,
    userName                varchar(255) NULL,
    userPassword            varchar(255) NULL,
    themePreferences        varchar(255) NULL,
    quote                   varchar(255)
);

CREATE TABLE userBadge (
    badgeID                 int NOT NULL,
    userID                  int NOT NULL,
    CONSTRAINT pk_UserBadge PRIMARY KEY (userID, badgeID),
    FOREIGN KEY (badgeID) REFERENCES Badge (badgeID),
    FOREIGN KEY (userID) REFERENCES User (userID)
);

CREATE TABLE forumPage (
    forumPageID             int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    forumPageName           varchar(100) NULL,
    forumPageContent        varchar(1000) NULL,
    forumPageLastModifiedDate   date NULL,
    FOREIGN KEY (userID) REFERENCES User (userID)
);

CREATE TABLE topic (
    topicID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    topicName               varchar(100) NULL,
    topicDescription        varchar(255) NULL
);

CREATE TABLE category (
    categoryID              int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    topicID                 int NULL,
    categoryName            varchar(100),
    categoryDescription     varchar(255),
    FOREIGN KEY (topicID) REFERENCES Topic (topicID)
);

CREATE TABLE post (
    postID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    categoryID              int NULL,
    postName                varchar(100),
    postContent             varchar(1000),
    postImage               varchar(255),
    lastModifiedPostDate    date NULL,
    lastModifiedPostTime    time NULL,
    backgroundColor         varchar(30),
    fontColor               varchar(30),
    fontType                varchar(30),
    stickyPost              boolean,
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (categoryID) REFERENCES Category (categoryID)
);

CREATE TABLE reply (
    replyID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    postID                  int NULL,
    replyContent            varchar(1000) NULL,
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (postID) REFERENCES Post (postID)
);

CREATE TABLE tag (
    tagID                   int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    postID                  int NULL,
    replyID                 int NULL,
    tagName                 varchar(100),
    FOREIGN KEY (postID) REFERENCES Post (postID),
    FOREIGN KEY (replyID) REFERENCES Reply (replyID)
);

CREATE TABLE accesLevel (
    accesLevelID            int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesName               varchar(100) NULL,
    accesDescription        varchar(255) NULL
);

CREATE TABLE userAccesLevel (
    userID                  int NOT NULL,
    accesLevelID            int NOT NULL,
    CONSTRAINT pk_userAccesLevel PRIMARY KEY (userID, accesLevelID),
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (accesLevelID) REFERENCES AccesLevel (accesLevelID)
);

-- Create user and grant access to this specific database
DROP USER 'dbuser'@'localhost';
CREATE USER 'dbuser'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON boardgame_db.* To 'dbuser'@'localhost' IDENTIFIED BY '1234'; FLUSH PRIVILEGES;

-- ---------------------------------
-- STORED PROCEDURES
-- ---------------------------------

DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_get_email`(IN input_email VARCHAR(255)) 
    BEGIN
        SELECT userID, email, userPassword FROM User WHERE email = 'input_email' LIMIT 1;
    END$$
DELIMITER ;