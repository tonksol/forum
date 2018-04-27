#TO DO
- connection in function en call the the function instead of global $connection
- connection in the presistance layer
- forumPage add new colum in the database "pageOrder"
- make something so you can change the order of the pages on the pageManager.php
-  image resizer heigh and width... max above 15000 pixels wide / Aviary.com
- fix userProfile_page.php on tonkebult.nl
- fix the homepage
- only insert a new page if the forumPageName !emtpy() && forumPageContent !empty()

# strucuture
- functies aanroepen in presentation layer
- elke tabel een eigen DAO.
- kijk naar wat hij terug geeft.. in die DAO moet hij 
- category DAO, TopicDAO, postDAO

- FEEDBACK 
- every query in stored procedure 
- html- realescape strings html special chars / trim (filter the (user) input)
- overview pages more structure (overview index) dropdown or horizontal menu + preview of the data that is in there
- edit forum posts 
- add new forum posts
- exstend the user profile page
    - statistics, graphs, how many posts did the user make... 
    - build on the badges
    - inspiration: stack overflow (gamafication and personalisation) make it fun to do more posts
- check for the dimensions of the picture (image resizer) see facebook message max 1500 pixels wide
- cdn (do some research for yourself)



#POST
user can make a new post. 

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
- - BUSINESS
- adminDAO.php

- - PRESENTATION
- navigation.php
- forumPage.php

# delete voor tonkebult.nl
- rulePage.php
- contactPage.php
- aboutPage.php
- 

