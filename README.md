# savvy - Web Engineering Project
##Analysis
###Scenario

Online service where users can post their ultimate wisdom and interact with other wisdoms. FHNW students can go to savvy.io ( for example) and choose what topics they want to take, calculate their points, choose a path for graduation (180 ECTS), post their thoughts about a specific topic. Other users can vote up or vote down this post to make it reach to the top of a specific topic or to the bottom. Moreover, topics will be divided between electives or main or core 

###Requirements

- Users must be able to login using a username and a password.
- The system shall provide a remember me function for login data.
- If the password is forgotten, it should be possible to get a new one using email.  
- The password must be securely stored.  
- There must be a database to store modules, comments and users.
- The system should provide a list of comments that where posted about a specific topic. 
- Users should be able to like comments.
- Users must have the ability to edit and delete their own posts.
- Users must be able to create modules including a name, a descirption and a value for the number of credits.
- Users must be able to update and delete the modules they have added.
- The system shall provide the user with the information how many users have inscribed into a module.
- The system shall be able to calculate the total of the ECTS points of all modules a user has selected.
- (Optional) Users should have the ability to post images as a comment.
- (Optional) Create PDF files from chosen topics
##Implementation
##Deployment
The system was deployed on the PaaS platform heroku. It can be accessed with the following URL:
[savvy](https://savvy-fhnw.herokuapp.com/)
