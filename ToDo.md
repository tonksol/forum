#TO DO
- connection in function en call the the function instead of global $connection
- connection in the presistance layer
- forumPage add new colum in the database "pageOrder"
- make something so you can change the order of the pages on the pageManager.php
-  image resizer heigh and width... max above 15000 pixels wide / Aviary.com
- fix userProfile_page.php on tonkebult.nl
- fix the homepage
- only insert a new page if the forumPageName !emtpy() && forumPageContent !empty()

- reply: Optie om te deleten als jij de eigenaar bent (user)
- reply: optie om te updaten als jij de eigenaar bent (user)

# strucuture
- functies aanroepen in presentation layer
- elke tabel een eigen DAO.
- kijk naar wat hij terug geeft.. in die DAO moet hij 
- category DAO, TopicDAO, postDAO

- FEEDBACK 
+ every query in stored procedure 
+ html- realescape strings first() (trim() second. output anders krijg je html/js op je site!) html special chars(alleen speciale caracters eruit filteren) / trim (filter the (user) input)
+ overview pages more structure (overview index) dropdown or horizontal menu + preview of the data that is in there
+ edit forum posts 
+ add new forum posts
6. exstend the user profile page
    - statistics, graphs, how many posts did the user make... 
    - build on the badges
    - inspiration: stack overflow (gamafication and personalisation) make it fun to do more posts
+ check for the dimensions of the picture (image resizer) see facebook message max 1500 pixels wide
- cdn (do some research for yourself)
+ reply updaten 
4. sticky posts
5. stylings settings


- TO DO: overal een knop naar add new post (nu in navigatie)



#POST
- user can make a new post. 
- voorkom dat de dropdown terug springen naar het eerste veld. (newPost.php)

#USER
- voeg eigen cover toe (nieuwe rij in database) en laad de cover vanuit de db. userprofile_page.php en userprofile.php

# Sign up
- sign in -- authentication if the email is a real email (boolean) add a column in the database 
- geef de user ook een acceslevel by default. 
- geef de user ook een proflepic0.png by default 

# Log in
- build the code for remember my email for the login (logIn_form.php)
- if the user doesn't exsits send a message
- expire log in session after... https://stackoverflow.com/questions/20516969/automatic-logout-after-15-minutes-of-inactive-in-php?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa

#logout
- adding a logout page

#posts
- update getdate() for new posts and getTime()

# NIEUWE USER
- geef elke nieuwe user een badge 
# contactpage
- html form
- send a message to admin. 

#The front page must contain (loaded from database):
- Hot Discussions
- Create a new discussion - Latest Posts
- About the Forum
- Sticky posts
# Forum post with text styling and image upload
# A User profile page with all data stored in a Database, as advanced as you can build it. 
Could be:
- Simple user display with email, name, birthdate and rank/access level, badges.
- An advanced graphic representation of the user data.

Must include:
- User editable settings and information




#insert this about text
This boardgame forum is home to everything about boardgames. Think about endless conversation about boardgames and authentic human connection.

<h5>Posts</h5>
The community can share content by posting stories, questions and images.

<h5>Replies</h5>
The community comments on posts. Comments provide discussion, humor and help.

# insert this in contact text
Please do not hesitate to contact us. 

CONTACT
Boardgame Forum 
+45 32 47 20 00
E-mail: info@boardgameforum.nl

PRESS
E-mail: presse@boardgameforum.nl




# Information
PDO is also for diffrent databases
mysqli is only for MYSQL 


- put your logic in different files 
- insert into variable = back practice put it in a stored procedure. 
- topic en category omgedraaid
- post = discussion
- post->topic->category / category->topic->post

# Verslag
login
signup

login in popup modal
switch the button on navbar to login logout

- maked the user profile
- only give acces to the user profile if the user is logged in

- changed birthdate into birthday

- put all the queries into stored procedures to prefent SQL injection
- make the user information read only unless you are additing
- function for switching the submit and edit button
- resize the uploaded picture in uploadImage.php

- I add replyDate and replyTime to the reply table. Because the user want to know when somebody writes a reply.
- check welke acces level de user heeft (alleen relevant voor de back-end)
- make all the read queries and functions for post, topics, and category. And make links
- add a rule table

# feedback verslag
- my profile page
- prime feature - nested for each to show the badges
- take some of the things that you are most proud of and describe them in higher detail. That will give a level of depth. Don't: then I did this then i did that, etc. The intation was to do this, this and that. I achieved that true a function that (example) loads the image, figure out the size of it, if every thing is okay, etc. 
- only screenshots of some of the code. Here specificly i check for the file size.. to avoid huge files on my server, etc. Don't technally describe your code. 
- What were the requirements? How did you implement the requirements. What where your thougts? What where the alternatives. 
- Guide for report writing: not the methodology stuff. It's about the structure. title, preface, main part, conclusion, perspective.
- problem: not much to write her. Pretend that the teachter is the customer/client who request a forum. 

#bronnen
- http://mindmup.github.io/bootstrap-wysiwyg/


#PLUGIN IDEE

plugin die alle relatieve paden goed zet zodat je makkelijk kan switchen tussen localhost en je webhost


# Uploaden voor tonkebult.nl


# delete voor tonkebult.nl
- rulePage.php
- contactPage.php
- aboutPage.php
- 

# Conclusion
- expire after 15 minutes