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
### Step 1 : Structure (Ali)
For this project, we have used a framework that offered by our lecturer Andreas Martin (@andreasmartin) with little adaptations. a detailed description of the framework can be found at https://github.com/andreasmartin/WE-CRM 

### Step 2 : Routing (Kevin)
In this step, the routing was created.
- Created Router and Routing Expeption files using the method suggested by our lecturer Andreas Martin.
- Added corresponding routes to index.php file.
- "Get" routes were mainly used for loading pages only while "post" requests were used when data had to be sent to the server.

### Step 3 : Database (Kevin)
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
### Step 4 : Database Access and Domain Objects (Kevin)
In this step, the DAO objects have been created. The database was accessed using PDO funcntionality.
- Created classes and methods required for accessing the database.
- Created SQL statements for adding, editing, deleting or loading data from the database. (These statements can be discovered in the classes inside the DAO folder)
- Implemented these statements into the PDO environment.
- Created domain objects to hold the data retrieved from the database.
- Added getters, setters and other required methods

### Step 5 : Business Services (Ali/Kevin)
In this step, the services have been created. All the services correspond to a use case.
- Created a service class for every use case group.
- Added a method for every use case.
- Implemented basic business functionality (Retrieve/edit/add/delete data from DAO).
- Added functionality to hash entries where necessary (storing passwords etc.)
- Added functionality to calculate credits.

### Step 6 : Register/Login frontend (Ali/Kevin)
In this step, the frontend of the register and the login functionality have been created.
- Created a static login and register pages using Bootstrap Studio. (Ali)
- Added pages to PHP project and converted them into php files. (Ali)
- Added dynamic entries, such as possible error messages, with PHP. (Kevin)
- Created corresponding routes and added required methods to the StudentController class. (Kevin)
- Filled methods to read, add, update or delete Authtoken and Student entries using business services in StudentServiceImpl class. (Kevin)
- Created StudentValidator class that prevents user from entering invalid or malicious data when registering. (Kevin)

### Step 7 : Module view frontend (Kevin / Ali)
In this step, the frontend for the module management has been created.
- Created static HTML pages for viewing modules using Bootstrap Studio. (Ali)
- Created static HTML pages for adding and editing modules. (Kevin)
- Added pages to PHP project and converted them into php files. (Ali)
- Added dynamic entries to the addModule.php file, such as error messages. (Kevin)
- Added dynamic entries to the main.php file, such as modules list, edit or delete buttons. (Ali)
- Created corresponding routes and added required methods to the ModuleController class. (Kevin)
- Filled methods to read, add, update or delete Modules entries using business services in ModuleServiceImpl class. (Kevin)
- Created ModuleValidator class that prevents users from entering invalid or malicous data when creating or editing a module. (Kevin)

### Step 8 : Comementing frontend (Ali)
- for every module, there is a commenting section attached to it. For this functionality, we have used a javascript framework called jquery comments with alot of adaptations to it. the user interface provides ajax callbacks that communicate with our server and our postgre database.
![](modeling/Commenting/comment1.png)
all comments show the data, weather they are new or not ( anything written in less than 24 hours is new) and the person who wrote them. 
- only users who wrote a comment can delete it. 
- a comment that has replies can't be deleted. 
- replies use the orginal comment as a parent 
- the UI asks for confirmations (JS) before deleting a comment to prevent deletion by mistake
- responsive UI that uses ajax calls make it extremly user friendly 
- possiblity to add attachments functionality in the future. 

### Step 9 : Module Selection frontend (Ali)
- every Module has a check box to be added to the current student list
- a student can as many modules as he or she wants
- an automatic calculations of ECTS take place on the server side for the modules registerd. 
- Each module show the amount of students registerd in each module.
### Step 10 : PDF creation (Ali)
- for pdf creattion we have used an open-source tool called fpdf
- a dynamic pdf will be generated that contains all the modules a student selected ( currently or in total) 
- a student can print his or her selected modules directly from the browser.
- Future improvment: add the amount of credits to the list
### Step 11 : Email Service (Kevin)
In this step, the email service was created that is responsible to send emails when users have forgotten their passwords.
- Created account on [sendgrid](https://sendgrid.com).
- Retrieved an API key.
- Created the EmailService class which will be responsible to treat email sending requests.
- Created an email template for all emails the website will send.
- Created a method that fills and sends the email template in case a user resets the password. The emails were send using the method described in the [sendgrid documentation](https://sendgrid.com/docs/index.html).
- The reset-Email sends a link with a random get-argument to the website where the user can proceed to change the password.
- Created static pages needed for password reset using based on the login.php page.
- Added dynamic entries, such as error messages, using PHP.
### Step 12 : Misc (Kevin / Ali)
In this step some missing pages were added.
- Created *contact us* us form. (Ali)
- Connected *contact us* form to email service. (Kevin)
- Added license agreement. (Kevin)

## Deployment
The system was deployed on the PaaS platform heroku. It can be accessed with the following URL:


[savvy](https://savvy-fhnw.herokuapp.com/)

## Authors
- Ali Habbabeh
- Kevin Neuschwander

