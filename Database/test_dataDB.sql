USE boardgames_db;
-- ------------------------------
-- USER 
-- ------------------------------

-- Arthur the King = admin
-- login name: arthur@king.com pw: test
INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthday`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (1, "Tonke", "", "Bult", "1991-02-11", "profilepic1.png", "tonksol@gmail.com", 'magicUnicorn', '$2y$15$43cjmaiBAzoBT.BI2q9EleSVjcgJdjvRamlYdLPi27PZrnGSKnYRu', NULL, "Take nothing then photograph's. Leave nothing then footprints.");

INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthday`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (2, "Bas", "van", "Dijk", "1985-05-16", "profilepic3.png", "vandijk@gmail.com", 'crunchyGamer', '$2y$15$43cjmaiBAzoBT.BI2q9EleSVjcgJdjvRamlYdLPi27PZrnGSKnYRu', NULL, "Crunchy games are the best games");


-- password = test
INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthday`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (3, 'Arthur', 'the', 'King', NULL, '', 'arthur@king.com', 'THE_KING', '$2y$15$43cjmaiBAzoBT.BI2q9EleSVjcgJdjvRamlYdLPi27PZrnGSKnYRu', '', 'I have knights at my round table!');


-- ------------------------------
-- ACCES LEVEL USER
-- ------------------------------
INSERT INTO `accesLevel` (`accesLevelID`,`accesName`, `accesDescription`)
VALUES 
    (1, 'admin', 'Have access to everything');

INSERT INTO `accesLevel` (`accesLevelID`,`accesName`, `accesDescription`)
VALUES 
    (2, 'user', 'Have access to the member area');

-- tonke - acces level - admin
INSERT INTO `userAccesLevel` (`userID`, `accesLevelID`)
VALUES 
    (1,1);

    -- Bas van Dijk - acces level - user
INSERT INTO `userAccesLevel` (`userID`, `accesLevelID`)
VALUES 
    (2,2);

-- arthur the king - acces level - admin
INSERT INTO `userAccesLevel` (`userID`, `accesLevelID`)
VALUES 
    (4,1);

-- ------------------------------
-- BADGE
-- ------------------------------

INSERT INTO `badge` (`badgeID`, `badgeName`, `badgeImage`, `badgeDescription`)
VALUES 
    (1, 'First post', 'badge1.png', 'Place your first post on the Boardgame Forum');

INSERT INTO `badge` (`badgeID`, `badgeName`, `badgeImage`, `badgeDescription`)
VALUES 
    (2, 'Frequent visitor', 'badge2.png', 'Visit the forum on a weekly basis');

INSERT INTO `badge` (`badgeID`, `badgeName`, `badgeImage`, `badgeDescription`)
VALUES 
    (3, 'Beginner badge', 'badge3.png', 'Fill in your user info on the profile page');

-- ------------------------------
-- USERBADGE
-- ------------------------------

INSERT INTO `userBadge` (`badgeID`, `userID`)
VALUES 
    ( 1, 1);

INSERT INTO `userBadge` (`badgeID`, `userID`)
VALUES 
    (2,1);

INSERT INTO `userBadge` (`badgeID`, `userID`)
VALUES 
    (3,1);


INSERT INTO `userBadge` (`badgeID`, `userID`)
VALUES 
    (1, 2);

INSERT INTO `userBadge` (`badgeID`, `userID`)
VALUES 
    (2, 2);

INSERT INTO `userBadge` (`badgeID`, `userID`)
VALUES 
    (3, 2);


-- ------------------------------
-- Category
-- ------------------------------

INSERT INTO `category`(`categoryID`, `categoryName`,`categoryDescription`,`img1`, `img2`, `img3`)
VALUES
    (1, 'Family Games', 'Everything about playing boardgames' , '', '', '');

INSERT INTO `category`(`categoryID`, `categoryName`,`categoryDescription`,`img1`, `img2`, `img3`)
VALUES
    (2, 'Dexterity Games', 'Everything about designing new boardgames' , '', '', '');

INSERT INTO `category`(`categoryID`, `categoryName`,`categoryDescription`,`img1`, `img2`, `img3`)
VALUES
    (3, 'Eurogames', 'Most Eurogames share the following elements:
Player conflict is indirect and usually involves competition over resources or points. Combat is extremely rare.
Players are never eliminated from the game (All players are still playing when the game ends.)
There is very little randomness or luck. Randomness that is there is mitigated by having the player decide what to do after a random event happens rather than before. Dice are rare, but not unheard of, in a Euro.
The Designer of the game is listed on the game\'s box cover. Though this is not particular to Euros, the Eurogame movement seems to have started this trend. This is why some gamers and designers call this genre of games Designer Games.
Much attention is paid to the artwork and components. Plastic and metal are rare, more often pieces are made of wood.
Eurogames have a definite theme, however, the theme most often has very little to do with the gameplay. The focus instead is on the mechanics; for example, a game about space may play the same as a game about ancient Rome.', '','','');


-- ------------------------------
-- TOPIC
-- ------------------------------

INSERT INTO `topic` (`topicID`, `categoryID`,`topicName`, `topicDescription`, `topic_img1`, `topic_img2` , `topic_img3`)
VALUES
    (1, 1, 'Monopoly', 'Monoply is a board game where players roll two six-sided dice to move around the game board, buying and trading properties, and develop them with houses and hotels. Players collect rent from their opponents, with the goal being to drive them into bankruptcy.', '', '', '');

INSERT INTO `topic` (`topicID`, `categoryID`,`topicName`, `topicDescription`, `topic_img1`, `topic_img2` , `topic_img3`)
VALUES
    (2, 1, 'Risk', 'Risk is a strategy board game of diplomacy, conflict and conquest[1] for two to six players. The standard version is played on a board depicting a political map of the earth, divided into forty-two territories, which are grouped into six continents.', '', '', '');

INSERT INTO `topic` (`topicID`, `categoryID`,`topicName`, `topicDescription`, `topic_img1`, `topic_img2` , `topic_img3`)
VALUES
    (3, 2, 'Twister', 'This is a game of physical skill. It is played on a large plastic mat that is spread on the floor or ground.', '', '', '');

INSERT INTO `topic` (`topicID`, `categoryID`,`topicName`, `topicDescription`, `topic_img1`, `topic_img2` , `topic_img3`)
VALUES
    (4, 3, 'Catan', 'In Catan (formerly The Settlers of Catan), players try to be the dominant force on the island of Catan by building settlements, cities, and roads. On each turn dice are rolled to determine what resources the island produces. Players collect these resources (cards)—wood, grain, brick, sheep, or stone—to build up their civilizations to get to 10 victory points and win the game.', '', '', '');

INSERT INTO `topic` (`topicID`, `categoryID`,`topicName`, `topicDescription`, `topic_img1`, `topic_img2` , `topic_img3`)
VALUES
    (5, 3, 'Power Grid', 'Power Grid is the updated release of the Friedemann Friese crayon game Funkenschlag. It removes the crayon aspect from network building in the original edition, while retaining the fluctuating commodities market.', '', '', '');

INSERT INTO `topic` (`topicID`, `categoryID`,`topicName`, `topicDescription`, `topic_img1`, `topic_img2` , `topic_img3`)
VALUES
    (6, 3, 'Carcassonne', 'Carcassonne is a tile-placement game in which the players draw and place a tile with a piece of southern French landscape on it. The tile might feature a city, a road, a cloister, grassland or some combination thereof, and it must be placed adjacent to tiles that have already been played, in such a way that cities are connected to cities, roads to roads, etcetera.', '', '', '');


-- ------------------------------
-- POST
-- ------------------------------

INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   1, 
        1, 
        1, 
        'Better than this classic',
        'Folks, I\'ve been playing this game for decades. Is there something better and more modern than this game? <br>
        And I don\'t just mean dry, cause Monopoly is not dry with it\'s whimsical nature. <br>
        I\'d like something like Monopoly but fun and whimsical that\'s easy to teach with a satisfying end game. <br>
        <br>
        Does this game exists? <br>
        <br>
        Thank you.',
        'post_img1.jpg',
        '2018-02-16',
        '11:34:02',
        '',
        '',
        '',
        0
        );

INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   2, 
        3, 
        1, 
        "jail `as` a strategy", 
        'I don\'t know `if` this has been asked before so forgive if it has. Does anyone else out there use Jail as a strategy to avoid paying rent while collecting rent?',
        'blank.png',
        '2016-04-21',
        '18:07:30',
        '',
        '',
        '',
        0
    );

INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   3, 
        1, 
        2, 
        "Classic Rice dice rules problem", 
        'My friends and I were playing risk a week ago. It was their first time playing, I\’ve been playing for years. They read the rules and all agreed that the the rules for a tie is that if the defender had one troop on a territory and the attacker attacks with three dice and the defenders one dice ties with the attacker\’s highest dice then the attacker loses two troops. I don\’t know where they got that idea and it doesn\’t seem to match with the flow of the game. I might be wrong because I can\’t find anything online or in any other set of rules that says that you DONT lose two, but I can\’t find anything that says or even hints that you do. If anyone could find me an article or video that shows the rules specifically stating wether you lose one or two die in a tie against a defender with one die that would be great.',
        'blank.png',
        '2016-08-21',
        '18:07:30',
        '',
        '',
        '',
        0
    );

    INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   4, 
        2, 
        3, 
        "Reasonable max number of players?", 
        'I\'m thinking of using Twister in a language class, but I need to know what a reasonable max number of players is. It\'ll be for a very large kindergarten I visit, with an upwards of 30 or 40 students. I need to figure out how many copies of the game I would need to buy so I can see if I can get funding approved. Can I get away with 3 or 4, or am I looking at closer to 10 copies?',
        'blank.png',
        '2015-04-11',
        '18:07:30',
        '',
        '',
        '',
        0
    );

    INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   5, 
        1, 
        4, 
        'Harbor pieces', 
        'I am not understanding what harbor pieces do. I get the harbor trade rules and the ratios. Do we put the pieces at the harbors at the setup to determine what is traded?',
        'blank.png',
        '2013-02-01',
        '22:07:30',
        '',
        '',
        '',
        0
    );

    INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   6, 
        1, 
        5, 
        "Seeking Advice for Purchasing Power Grid", 
        'I played my friend\'s copy of Power Grid a few times and I loved it. I want to buy a copy for myself and, since I am the type of person who needs to have all the expansions, I am posting to ask your advice on which version I should get (Deluxe or Regular) and if there are any expansions that are out of print or if any of them only go with one version or the other. It seems like the last couple expansions have cover art that more resembles the Deluxe version than the regular one.',
        'blank.png',
        '2012-09-29',
        '9:55:21',
        '',
        '',
        '',
        0
    );

    INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   7, 
        1, 
        6, 
        'Looking for Carcassonne experts', 
        'I am writing a book about the game Carcassonne, and I would like to interview (by email) some of the game’s top players. I would like to get in contact with any English-speaker who has done very well (say, winner or finalist) at the world championship, or is a national champion. <br>
        <br>
        If anyone reading this thinks they fit this description, or know someone who does, please could you contact me. <br>
        <br>
        Also, I would like to interview Klaus-Jürgen Wrede (again, by email) but am having difficulty getting in touch with him. Can anyone help there? <br>
        <br>
        Thanks <br>
        Steve',
        'blank.png',
        '2016-07-15',
        '15:37:09',
        '',
        '',
        '',
        0
    );

    INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (   8, 
        1, 
        6, 
        'CARCASSONNE\´S FUN FACTS', 
        'Hi everyone! <br>
        I´m preparing a video about Carcassonne and I´m recolecting information not commonly known about the game, like fun facts about the author, records, things people do because of the game, you name it.
        So, I would be truly greatful if you could help me with that. <br>
        Any fun fact is welcome!',
        'blank.png',
        '2016-03-24',
        '11:27:30',
        '',
        '',
        '',
        0
    );

    INSERT INTO `post` (`postID`, 
                    `userID`, 
                    `topicID`, 
                    `postName`, 
                    `postContent`, 
                    `postImage`,
                    `lastModifiedPostDate`, 
                    `lastModifiedPostTime`, 
                    `backgroundColor`, 
                    `fontColor`, 
                    `fontType`, 
                    `stickyPost`)
VALUES
    (  
        9, 
        2, 
        6, 
        'A display showing what tiles have been picked?', 
        'Has anyone done something like blow up the "tile quantity list" images and created a board so everyone can see the likelihood of being able to finish that city, etc? Especially when playing with expansions. <br>
        <br>
        Some people can remember that sort of thing, but our group would rather have equal open knowledge. <br>
        <br>
        A fancy way might be to create a 10x10 board with black & white images of each tile, with the tiles on the board. Roll dice for the x & y axis to draw a tile.',
        'blank.png',
        '2016-11-18',
        '19:44:39',
        '',
        '',
        '',
        0
    );

  
-- to do
-- ------------------------------
-- Reply
-- ------------------------------

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 1, 2, 1, "I saw this. I wanted BGGs opinion on this also. Thank you though.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 2, 3, 1, "Mighty peculiar question from a person with a 450-game collection.");




INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 3, 3, 2, "Early on it's better to spend the money and get out so you can buy properties. Later in the game when everything has been bought you're better off in jail not paying rent. That's a strategy I use when I play.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 4, 2, 2, "Yep, I like to stay in jail as long as possible when the houses and hotels start coming out. But you need to get out fast early in the game to stay in the property race.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 5, 3, 2, "Do you still get to collect rent on your properties while you are in jail?");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 6, 1, 2, "Yes, \as long as you remember to ask for it.");





INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 7, 2, 6, "(Almost -- see post below) All of the expansions were designed to go with the original game. Deluxe is effectively a stand-alone -- though its pieces, plants, and market can theoretically be adapted to any map. <br>
There is a conversion kit that adds extra oil and garbage tokens so you can mix and match sets, but I don't think it would be easy to play regular PG maps with deluxe tokens. ");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 8, 3, 6, "I bought the Deluxe version and then decided I wanted some expansion maps. So, as mentioned above, I bought the conversion kit and the new power plant cards. It works great! However, if you know for sure that you want some expansions, just go for the original.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 9, 2, 6, "The two most recent expansions, Power Grid: Fabled Expansion and Power Grid: The Stock Companies are compatible with both the original Power Grid and the Deluxe game. The earlier expansions were only designed for original Power Grid, because the Deluxe version didn't exist yet. And as Alex says, most of them would be difficult to use with Deluxe.

I haven't played Deluxe, but I'm very happy with my original Power Grid and its many expansions! Deluxe does have better 2-player rules (Against the Trust) but even those are available for original Power Grid, downloadable for free from 2F's website. (Although Power Grid is not at its best with 2 anyway.)");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 10, 1, 6, "The deluxe edition is not as attractive to me, and the classic game has a better footprint.");


INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 11, 2, 6, "Both are good, but go with classic. Less space on the table, and you'll find more people who know the game immediately. The transition from one version to the other is very easy, but the original version has more exposure.");





INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 12, 2, 5, "I think they are there for variety. E.g. once you get sick of always having the wheat port there, you can cover it up with another port. But I'm just guessing.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 13, 3, 5, "That's what I've been hearing around these forums.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 14, 1, 5, "We shuffle them up and put them down after we get the map set. They are just for some randomness. You could leave them hidden until you take the harbor.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 15, 2, 5, "Seems unnecessary since the hexes are going to be placed randomly anyway.

It doesn't matter where the harbors are at. What matters is if something like a 6 or 8 wood is placed next to the wood harbor.");

INSERT INTO `reply`(
    `replyID`,
    `userID`,
    `postID`,
    `replyContent`
)
VALUES 
( 16, 3, 5, "It DOES matter where the 3:1 harbors are located. The game feels much different if they are scattered evenly than when they are all on the same side of the board.");



-- ------------------------------
-- forumPage
-- ------------------------------

-- ------------------------------
-- tag
-- ------------------------------


-- ------------------------------
-- 
-- ------------------------------


-- ------------------------------
-- 
-- ------------------------------


-- ------------------------------
-- 
-- ------------------------------