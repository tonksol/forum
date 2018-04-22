 --- DROP DATABASE IF EXISTS boardgames_db;
 CREATE DATABASE id5487947_boardgames_db;
 -- USE id5487947_boardgames_db;
-- GRANT ALL PRIVILEGES ON EmployeeDB. * To ''@'localhost' .....

 USE boardgames_db;


-- Create user and grant access to this specific database
DROP USER IF EXISTS 'dbuser'@'localhost';
CREATE USER 'dbuser'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON boardgame_db.* To 'dbuser'@'localhost' IDENTIFIED BY '1234'; FLUSH PRIVILEGES;


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
    birthday                date NULL,
    userImage               varchar(255) NULL,
    email                   varchar(255) NULL,
    realEmail               boolean,
    userName                varchar(255) NULL,
    userPassword            varchar(255) NULL,
    themePreferences        varchar(255) NULL,
    quote                   varchar(255),
    CONSTRAINT uc_email UNIQUE(email)
);

CREATE TABLE userBadge (
    badgeID                 int NOT NULL,
    userID                  int NOT NULL,
    CONSTRAINT pk_UserBadge PRIMARY KEY (userID, badgeID),
    FOREIGN KEY (badgeID) REFERENCES badge (badgeID),
    FOREIGN KEY (userID) REFERENCES user (userID)
);


CREATE TABLE forumPage (
    forumPageID             int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    forumPageName           varchar(100) NULL,
    forumPageContent        varchar(1000) NULL,
    forumPageLastModifiedDate   date NULL,
    FOREIGN KEY (userID) REFERENCES user (userID)
);

CREATE TABLE rule (
    ruleID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    forumPageID             int NULL,
    ruleDescription         varchar(500),
    FOREIGN KEY (forumPageID) REFERENCES forumPage (forumPageID)
);

CREATE TABLE category (
    categoryID              int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    categoryName            varchar(100),
    categoryDescription     varchar(255),
    img1                    varchar(255),
    img2                    varchar(255),
    img3                    varchar(255)
);

CREATE TABLE topic (
    topicID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    categoryID              int NOT NULL,
    topicName               varchar(100) NULL,
    topicDescription        varchar(255) NULL,
    topic_img1              varchar(255),
    topic_img2              varchar(255),
    topic_img3              varchar(255),
    FOREIGN KEY (categoryID) REFERENCES category (categoryID)
);

CREATE TABLE post (
    postID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    topicID                 int NULL,
    postName                varchar(100),
    postContent             varchar(1000),
    postImage               varchar(255),
    lastModifiedPostDate    date NULL,
    lastModifiedPostTime    time NULL,
    backgroundColor         varchar(30),
    fontColor               varchar(30),
    fontType                varchar(30),
    stickyPost              boolean,
    FOREIGN KEY (userID) REFERENCES user (userID),
    FOREIGN KEY (topicID) REFERENCES topic (topicID)
);

CREATE TABLE reply (
    replyID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    postID                  int NULL,
    replyContent            varchar(1000) NULL,
    replyDate               date NULL,
    replyTime               time NULL,
    FOREIGN KEY (userID) REFERENCES user (userID),
    FOREIGN KEY (postID) REFERENCES post (postID)
);

CREATE TABLE tag (
    tagID                   int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    postID                  int NULL,
    replyID                 int NULL,
    tagName                 varchar(100),
    FOREIGN KEY (postID) REFERENCES post (postID),
    FOREIGN KEY (replyID) REFERENCES reply (replyID)
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
    FOREIGN KEY (userID) REFERENCES user (userID),
    FOREIGN KEY (accesLevelID) REFERENCES accesLevel (accesLevelID)
);




-- ---------------------------------
-- STORED PROCEDURES
-- ---------------------------------

-- ---------------------------------
-- SELECT
-- ---------------------------------

-- log in
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_get_user_by_email`(IN input_email VARCHAR(255)) 
    BEGIN
        SELECT `user`.`userID`, `user`.`email`, `user`.`userPassword`, `accesLevel`.`accesLevelID`
        FROM `user`
        LEFT JOIN `userAccesLevel` ON `user`.`userID` = `userAccesLevel`.`userID`
        LEFT JOIN `accesLevel` ON `userAccesLevel`.`accesLevelID` = `accesLevel`.`accesLevelID` AND `accesLevel`.`accesName` = 'admin'
        WHERE `user`.`email` = input_email 

        UNION -- all unique rows from above and below

        SELECT `user`.`userID`, `user`.`email`, `user`.`userPassword`, `accesLevel`.`accesLevelID`
        FROM `user`
        RIGHT JOIN `userAccesLevel` ON `user`.`userID` = `userAccesLevel`.`userID`
        RIGHT JOIN `accesLevel` ON `userAccesLevel`.`accesLevelID` = `accesLevel`.`accesLevelID`AND `accesLevel`.`accesName` = 'admin'
        WHERE `user`.`email` = input_email;
    END$$
DELIMITER ;

-- user profile page
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_select_all_from_user`
    (
        IN input_userID int
    ) 
BEGIN 
    SELECT * 
    FROM `user`
    WHERE `userID` = input_userID;
    END$$
DELIMITER ; 

-- badge TO DO... ERRORS 
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_select_the_badges`
    (
        IN input_userID int
    )
    BEGIN
        SELECT * 
        FROM `badge`
        JOIN `userBadge` ON `badge`.`badgeID` = `userBadge`.`badgeID`
        WHERE `userBadge`.`userID` = input_userID;
    END $$
DELIMITER ; 


-- --------------
-- INSERT
-- --------------

-- Sign up user table
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE proc_insert_new_user(IN input_email VARCHAR(255), IN input_username VARCHAR(255), IN input_password VARCHAR(255))
    BEGIN
        INSERT INTO `user` (`email`, `userName`, `userPassword`) VALUES (input_email, input_username, input_password);
    END$$
DELIMITER ;

-- sign up userAccesLevel NOG NIET KLAAR!!!!!!!!!!!!!
-- DELIMITER $$
-- CREATE DEFINER= `root`@`localhost` PROCEDURE proc_insert_userAccesLevel()
--     BEGIN
--         INSERT INTO `userAccesLevel` VALUES (`userID`, `accesLevelID`) VALUES ('LAST_INSERT_ID()' ,2);
--     END $$
-- DELIMITER ;


-- --------------
-- UPDATE
-- --------------
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_update_userinfo`
    (
        IN input_userID int,
        IN input_firstname VARCHAR(100),
        IN input_prefix VARCHAR(30),
        IN input_lastname VARCHAR(100),
        IN input_birthday DATE,
        IN input_email VARCHAR(255),
        IN input_username VARCHAR(255),
        IN input_quote VARCHAR(255)
    ) 
    BEGIN 
        UPDATE `user`
        SET `firstName` = input_firstname, `prefix` = input_prefix, `lastName` = input_lastname, `birthday` = input_birthday, `email` = input_email, `userName` = input_username, `quote` = input_quote
        WHERE `userID` = input_userID;
    END$$
DELIMITER ; 

-- update profile picture
-- UPDATE `user` SET `userImage` = '$newname' WHERE `userID` = $userID
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_update_profilepicture`
    (
        IN input_userID int,
        IN input_userImage varchar(255)
    ) 
    BEGIN 
        UPDATE `user`
        SET `userImage` = input_userImage
        WHERE `userID` = input_userID;
    END$$
DELIMITER ; 








