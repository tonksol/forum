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

-- --------------
-- CREATE / INSERT
-- --------------

-- Sign up user table
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_insert_new_user`(IN input_email VARCHAR(255), IN input_username VARCHAR(255), IN input_password VARCHAR(255))
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

-- forumPageDAO
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_insertNewPage`(IN input_userID INT, IN input_pagename VARCHAR(100), IN input_pagecontent VARCHAR(1000), IN input_todaysdate DATE)
    BEGIN
        INSERT INTO `forumPage` ( `userID`, `forumPageName`, `forumPageContent`, `forumPageLastModifiedDate`) 
                VALUES (input_userID, input_pagename, input_pagecontent, input_todaysdate);
END$$
DELIMITER ;

-- postDAO
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_newPost`(IN input_userID INT, IN input_topicID INT, IN input_postName VARCHAR(100), IN input_postcontent VARCHAR(1000))
    BEGIN
        INSERT INTO `post` (`userID`,`topicID`, `postName` ,`postContent`, `lastModifiedPostDate`, `lastModifiedPostTime`)
            VALUES (input_userID, input_topicID, input_postName, input_postcontent, CURRENT_DATE, CURRENT_TIME);
END$$
DELIMITER ;

-- replyDAO
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_newReply`(IN input_userID INT, IN input_postID INT, IN input_postcontent VARCHAR(1000))
    BEGIN
        INSERT INTO `reply` ( `userID`, `postID`, `replyContent`, `replyDate`, `replyTime`) 
        VALUES (input_userID, input_postID, input_postcontent, CURRENT_DATE, CURRENT_TIME);
    END$$
DELIMITER ;

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

-- badgeDAO 
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

-- forumPageDAO
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_getPage`(IN input_pageID INT)
    BEGIN
        SELECT * 
        FROM forumPage
        WHERE forumPageID = input_pageID;
    END $$
DELIMITER ;

-- categoryDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_select_all_from_category`()
    BEGIN
        SELECT * 
        FROM `category`;
    END $$
DELIMITER ; 

-- categoryDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getCategoriesForOverview`()
    BEGIN
        SELECT DISTINCT `category`.`categoryID`, `category`.`categoryName`, `category`.`categoryDescription`, COUNT(`topic`.`categoryID`) as 'numberOfTopics'
        FROM `category` 
        JOIN `topic` ON `category`.`categoryID` = `topic`.`categoryID`
        WHERE `category`.`categoryID` = `topic`.`categoryID`
	    GROUP BY `topic`.`categoryID`
        ORDER BY `category`.`categoryName` ASC;
    END $$
DELIMITER ; 

-- categoryDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getCategoryHead`(IN input_categoryID int)
    BEGIN
        SELECT * 
        FROM category 
        WHERE categoryID = input_categoryID;
    END $$
DELIMITER ;

--categoryDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getNumberOfTopicsForCategory`(IN input_categoryID int)
    BEGIN
        SELECT DISTINCT  `category`.`categoryName`, `topic`.`topicName`, COUNT(`topic`.`categoryID`) as 'numberOfTopics'
        FROM `topic` 
        JOIN `category` ON `category`.`categoryID` = `topic`.`categoryID`
        WHERE `topic`.`categoryID` = input_categoryID
        GROUP BY `topic`.`categoryID`
        ORDER BY `category`.`categoryName` ASC;
    END $$
DELIMITER ;

-- forumPageDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getRules`()
    BEGIN
        SELECT * 
        FROM `rule`;
    END $$
DELIMITER ;

-- forumPageDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getPages`()
    BEGIN
        SELECT * 
        FROM `forumPage`;
    END $$
DELIMITER ;

-- forumPageDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getPageInfo`(IN input_forumPageID INT)
    BEGIN
        SELECT * 
        FROM `forumPage` WHERE `forumPageID` = input_forumPageID;
    END $$
DELIMITER ;

-- forumPageDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getPagesForOverview`()
    BEGIN
        SELECT * 
        FROM `forumPage` 
        JOIN `user` 
        ON `forumPage`.`userID` = `user`.`userID`;
    END $$
DELIMITER ;

-- postDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getPosts`(IN input_topicID INT)
    BEGIN
        SELECT `user`.`userName`, `post`.`postID`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`
        FROM `post` 
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        WHERE `post`.`topicID` = input_topicID
        ORDER BY `post`.`lastModifiedPostDate` DESC, `post`.`lastModifiedPostTime` DESC;
    END $$
DELIMITER ;

-- postDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getHotPosts`()
    BEGIN
        SELECT `topic`.`topicName`, `topic`.`topicID`, `post`.`postID`, `post`.`postName`, 
                `user`.`userName`,`post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, 
                COUNT(`reply`.`replyID`) as `numberOfReplies`
        FROM `topic`
        JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID` 
        GROUP BY `post`.`postName`
        ORDER BY `numberOfReplies` DESC LIMIT 5;
    END $$
DELIMITER ;

-- postDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getNewestPosts`()
    BEGIN
        SELECT `topic`.`topicName`, `topic`.`topicID`, `post`.`postID`, `post`.`postName`, `user`.`userName`,`post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOfReplies`
        FROM `topic`
        JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID` 
            GROUP BY `post`.`postName`
            ORDER BY `post`.`lastModifiedPostDate` DESC, `post`.`lastModifiedPostTime` DESC LIMIT 5;
    END $$
DELIMITER ;

-- postDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getSelectedPostsHead`(IN input_postID INT)
    BEGIN
        SELECT `post`.`postName`, `user`.`userID`, `user`.`userName`, DAYNAME(`post`.`lastModifiedPostDate`) as 'dayname',`post`.`lastModifiedPostDate`, `topic`.`topicName`, `topic`.`topicID` 
        FROM `post` JOIN `user` ON `post`.`userID` = `user`.`userID` 
        JOIN `topic` ON `topic`.`topicID` = `post`.`topicID`
        WHERE `postID` = input_postID;
    END $$
DELIMITER ;

-- editPost
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getPostDetails`(IN input_postID INT)
    BEGIN
        SELECT `postName`, `postContent` 
        FROM `post`
        WHERE `postID` = input_postID;
    END $$
DELIMITER ;

-- postDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getSelectedPostsContent`(IN input_postID INT)
    BEGIN
        SELECT `post`.`postImage`, `user`.`userID`, `user`.`userName`, `post`.`postName`, `post`.`postContent` 
        FROM `post` 
        JOIN `user` ON `post`.`userID` = `user`.`userID` 
        WHERE `postID` = input_postID;     
    END $$
DELIMITER ;

-- replyDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getReplies`(IN input_postID INT)
    BEGIN
        SELECT `user`.`userName`, `reply`.`replyID`, `reply`.`userID`, `reply`.`replyDate`, `reply`.`replyTime`, `reply`.`replyContent`
        FROM `reply` 
        JOIN `user` ON `reply`.`userID` = `user`.`userID`
        WHERE postID = input_postID
        ORDER BY `reply`.`replyDate`, `reply`.`replyTime` ASC;
    END $$
DELIMITER ;

-- topicDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getTopics`(IN input_categoryID INT)
    BEGIN
        SELECT * 
        FROM `topic` 
        WHERE `categoryID` = input_categoryID;
    END $$
DELIMITER ;

-- topicDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getTopicsForOverview`()
    BEGIN
        SELECT `category`.`categoryID`, `category`.`categoryName`, `topic`.`topicID`, `topic`.`topicName`, `topic`.`topicDescription`, COUNT(post.topicID) as `numberOfPosts`
        FROM `topic` 
        JOIN `category` ON `topic`.`categoryID` = `category`.`categoryID`
        JOIN `post` on `topic`.`topicID` = `post`.`topicID`
        GROUP BY `topic`.`topicID`;
    END $$
DELIMITER ;

-- topicDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getTopicsAndNumberOfPosts`(IN input_categoryID INT)
    BEGIN
        SELECT DISTINCT  `topic`.`topicID`, `topic`.`topicName`, `topic`.`topicDescription`, COUNT(`post`.`topicID`) as `numberOfPosts`
        FROM `topic` 
        JOIN `post` ON `post`.`topicID` = `topic`.`topicID`
        WHERE `topic`.`categoryID` = input_categoryID
        GROUP BY `post`.`topicID`
        ORDER BY `post`.`postName` ASC;
    END $$
DELIMITER ;

-- topicDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getSelectedTopicHead`(IN input_topicID INT)
    BEGIN
        SELECT `topic`.`topicName`, `topic`.`topicDescription`, `topic`.`topicID`, `category`.`categoryID`, `category`.`categoryName` 
        FROM `topic`  
        JOIN `category` ON `topic`.`categoryID` = `category`.`categoryID`
        WHERE `topicID` = input_topicID;
    END $$
DELIMITER ;

-- topicDAO
DELIMITER $$
CREATE DEFINER = `root`@`localhost` PROCEDURE `proc_getNumberOfPostsByTopic`(IN input_topicID INT)
    BEGIN
        SELECT COUNT(*) as `numberOfPosts`        
        FROM `post` 
        WHERE `post`.`topicID` = input_topicID
        GROUP BY `post`.`topicID`;
    END $$
DELIMITER ;

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

-- forumPageDAO
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_updatePageInfo`
    (
    IN input_userID INT, 
    IN input_pagename VARCHAR(100), 
    IN input_pagecontent VARCHAR(1000), 
    IN input_todaysdate date, 
    IN input_forumpageID INT
    )
    BEGIN 
        UPDATE `forumPage`
        SET `userID` = input_userID, `forumPageName` = input_pagename, `forumPageContent` = input_pagecontent, `forumPageLastModifiedDate` = input_todaysdate
        WHERE `forumPageID` = input_forumpageID;
    END$$
DELIMITER ; 

--postDAO
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_updatePost`
    (
    IN input_postID INT,
    IN input_postName VARCHAR(100),
    IN input_postcontent VARCHAR(1000) 
    )
    BEGIN 
        UPDATE `post`
        SET `postName`= input_postName ,`postContent` = input_postcontent
        WHERE `postID` = input_postID;
    END$$
DELIMITER ; 
 

-- --------------
-- DELETE
-- --------------

DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_deletePage`
    ( 
    IN input_forumpageID INT
    )
    BEGIN 
        DELETE FROM `forumPage` WHERE `forumPageID` = input_forumpageID;
    END$$
DELIMITER ; 

-- replyDOA
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_deleteReply`
    ( 
    IN input_replyID INT,
    IN input_userID INT
    )
    BEGIN 
        DELETE FROM `reply` WHERE `replyID` = input_replyID AND `userID` = input_userID;
    END$$
DELIMITER ; 

--postDOA
DELIMITER $$
CREATE DEFINER= `root`@`localhost` PROCEDURE `proc_deletePost`
(
    IN input_postID INT
)
BEGIN
    DELETE FROM `reply` WHERE `postID` = input_postID; 
    DELETE FROM `post` WHERE `postID` = input_postID; 
END $$
DELIMITER ; 









