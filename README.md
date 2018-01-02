# SAVVY - Web Engineering Project
## Analysis
### Scenario

Savvy is an online service where that students can use for module management. FHNW students can go to 
savvy&#8209;fhnw.herokuapp.com and choose what topics they want to take, calculate their points and post their thoughts about a specific topic. Other users can like this post to make it reach to the top of a specific topic or to the bottom.

### Requirements

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
- (Optional) Create PDF files from chosen topics.

### Use Cases
The use cases were divided into four groups.

#### User Management:

![](modeling/usecases/User-Management.jpg)
- UC 101: A user must be able to create an account consisting of username password and email address.
- UC 102: A user must be able to login to the account once it was created.
- UC 103: A user should be able to change the password of the account.
- UC 104: A user should be able to change the password of the account in case it is forgotten.
- UC 105: A system should provide a remember me function, that automatically logs in a user after a field was checked in the login window.

#### Module Management:

![](modeling/usecases/Module-Management.jpg)
- UC 201: A user must be able to add a module to the modules list. A module must consist of a name, a description and a field that shows the number of credits the module yields.
- UC 202: A user must be able to edit her or his modules.
- UC 203: A user must be able to delete her or his modules.
- UC 204: A user must be able to see a list of all the modules that have been added to the database.
- UC 205: A user should be able to see detailed information about a module. In savvy this is achieved by clicking the discuss button which also shows the comments.

#### Commenting:

![](modeling/usecases/Commenting.jpg)
- UC 301: The user must be able to read comments posted about a module.
- UC 302: The user must be able to create a comment for a module.
- UC 303: The user must be able to edit comments the user created.
- UC 304: The user must be able to delete comments the user created.
- UC 305: The user must be able to edit comments the user created.
- UC 306: The user should be able to reply to a comment.
- UC 307: The user should be able to like a comment.
- UC 308: A user should be able to add a picture to a comment.

#### Module Selection:

![](modeling/usecases/Module-Selection.jpg)
- UC 401: A user must be able to inscribe into a module.
- UC 402: A user must be able to see the modules the user has inscribed into.
- UC 403: A user should be able to see the total of ECTS achieved with the selected modules.
- UC 404: A user should be able to create a PDF page of the modules the user selected.

## Design
### Mockups
The following picture shows the *login* screen of savvy:

![](modeling/mockups/Savvy-Initial.jpg)

The following picture shows the page where the users can create a *comment* about a module:

![](modeling/mockups/Savvy-Main.jpg)

### Entity Relationship Diagram
![](modeling/architecture/WebpageData.jpg)
### Domain Model
![](modeling/architecture/Class-Diagram.jpg)
### Data Access Model 
![](modeling/architecture/Data-Access-Model.jpg)
### Busines Logic Model
![](modeling/architecture/Services.jpg)
### Layering Structure
![](modeling/architecture/Layering-Structure.jpg) 	

## Implementation
### Step 1 : Structure
### Step 2 : Routing
In this step, the routing was created.
- Created Router and Routing Expeption files as suggested by our lecturer Andreas Martin.
- Created index.php file where the routes were added in the next steps.

### Step 3 : Database
The database was created using the following code:
```SQL
CREATE TABLE Student (
  ID       SERIAL NOT NULL, 
  username varchar(15) NOT NULL UNIQUE, 
  password varchar(255) NOT NULL, 
  email    varchar(255) NOT NULL UNIQUE, 
  PRIMARY KEY (ID));
CREATE TABLE Comment (
  ID        SERIAL NOT NULL, 
  comment   varchar(255) NOT NULL, 
  ModuleID  int4 NOT NULL, 
  StudentID int4 NOT NULL, 
  image     bytea, 
  CommentID int4 NOT NULL, 
  created   date NOT NULL, 
  PRIMARY KEY (ID));
CREATE TABLE CommentVote (
  CommentID int4 NOT NULL, 
  StudentID int4 NOT NULL, 
  PRIMARY KEY (CommentID, 
  StudentID));
CREATE TABLE Inscription (
  ModuleID  int4 NOT NULL, 
  StudentID int4 NOT NULL, 
  PRIMARY KEY (ModuleID, 
  StudentID));
CREATE TABLE AuthToken (
  ID         SERIAL NOT NULL, 
  StudentID  int4 NOT NULL, 
  selector   varchar(255) NOT NULL, 
  validator  varchar(255) NOT NULL, 
  expiration timestamp NOT NULL, 
  type       int4 NOT NULL, 
  CONSTRAINT ID 
    PRIMARY KEY (ID));
CREATE TABLE Module (
  ID          SERIAL NOT NULL, 
  name        varchar(30) NOT NULL UNIQUE, 
  description varchar(255), 
  numCredits  int4, 
  StudentID   int4 NOT NULL, 
  PRIMARY KEY (ID));
ALTER TABLE CommentVote ADD CONSTRAINT isVoted FOREIGN KEY (CommentID) REFERENCES Comment (ID);
ALTER TABLE Comment ADD CONSTRAINT FKComment524391 FOREIGN KEY (ModuleID) REFERENCES Module (ID);
ALTER TABLE CommentVote ADD CONSTRAINT votes FOREIGN KEY (StudentID) REFERENCES Student (ID);
ALTER TABLE AuthToken ADD CONSTRAINT FKAuthToken902530 FOREIGN KEY (StudentID) REFERENCES Student (ID);
ALTER TABLE Inscription ADD CONSTRAINT hasInscriptions FOREIGN KEY (ModuleID) REFERENCES Module (ID);
ALTER TABLE Comment ADD CONSTRAINT writes FOREIGN KEY (StudentID) REFERENCES Student (ID);
ALTER TABLE Inscription ADD CONSTRAINT isInscribed FOREIGN KEY (StudentID) REFERENCES Student (ID);
ALTER TABLE Module ADD CONSTRAINT creates FOREIGN KEY (StudentID) REFERENCES Student (ID);
ALTER TABLE Comment ADD CONSTRAINT parent FOREIGN KEY (CommentID) REFERENCES Comment (ID);

```
### Step 4 : Database Access
In this step, the DAO objects have been created. The database was accessed using PDO funcntionality.
- Created classes and methods required for accessing the database.
- Created SQL statement retrieving or creating the correct entry for every method. (These statements can be discovered in the classes inside the DAO folder)
- Implemented these statements into the PDO environment.

### Step 5 : Business Services
In this step, the services have been created. All the services correspond to a use case.
- Created a service class for every use case group.
- Added a method for every use case.
- Implemented basic business functionality (Retrieve/edit/add/delete data from DAO).
- Added functionality to hash entries where necessary (password etc.)

### Step 6 : Register/Login frontend
In this step, the frontend of the register and the login functionality have been created.
- Created static login and register pages using Bootstrap Studio.
- Added pages to PHP project.
- Converted pages into php files.
- Added dynamic entries, such as possible error messages, with PHP.
- Created corresponding routes and added required methods to the StudentController class.
- Filled methods to read, add, update or delete Authtoken and Student entries using business services in StudentServiceImpl class.
- Created StudentValidator class that prevents user from entering invalid or malicious data when registering.

### Step 7 : Module view frontend
In this step, the frontend for the module management has been created.
- Created static HTML pages for viewing and adding modules using Bootstrap Studio.
- Added pages to PHP project.
- Converted pages into php files.
- Added dynamic entries to the addModule.php file, such as error messages.
- Added dynamic entries to the main.php file, such as modules list, edit or delete buttons.
- Created corresponding routes and added required methods to the ModuleController class.
- Filled methods to read, add, update or delete Modules entries using business services in ModuleServiceImpl class.
- Created ModuleValidator class that prevents users from entering invalid or malicous data when creating or editing a module.

### Step 8 : Comementing frontend
### Step 9 : Module Selection frontend
### Step 10 : PDF creation
### Step 11 : Email Service
In this step, the email service was created that is responsible to send emails when users have forgotten their passwords.
- Created account on [sendgrid](https://sendgrid.com).
- Retrieved and API key.
- Created EmailService class.
- Created Email template. Email sends a link with a random argument to the savvy page where the user can change the password.
- Created method that sends the email template. The emails were send using the method described in the [sendgrid documentation](https://sendgrid.com/docs/index.html).
- Created pages for password reset using variations of the login.php page.
- Added dynamic entries, such as error messages, using PHP.

## Deployment
The system was deployed on the PaaS platform heroku. It can be accessed with the following URL:


[savvy](https://savvy-fhnw.herokuapp.com/)

