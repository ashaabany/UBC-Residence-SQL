drop table TakeCourse;
drop table HouseLoungeIncludes;
drop table RoomsWith;
drop table FloorRA;
drop table HouseMember;
drop table Room;
drop table FloorIdentification;
drop table House;
drop table DiningHall;
drop table TakeSection;
drop table courseNumber;
drop table CourseDepartment;
drop table ResidenceCoordinator;
drop table Residence;





CREATE TABLE Residence(
	residenceName VARCHAR(50) PRIMARY KEY,
	priceRange VARCHAR(20),
	gymAvailable NUMBER(1),
	studySpaceAvailable NUMBER(1));

grant select on Residence to public;

CREATE TABLE ResidenceCoordinator(
	RCID INTEGER PRIMARY KEY,
	residenceName VARCHAR(50) NOT NULL,
	RCName VARCHAR(50),
	RCPhone VARCHAR(20),
	FOREIGN KEY (residenceName) REFERENCES Residence);
		--ON DELETE NO ACTION
		--ON UPDATE CASCADE


grant select on ResidenceCoordinator to public;


CREATE TABLE CourseDepartment(
	courseName VARCHAR(10) PRIMARY KEY,
	department VARCHAR(50));

grant select on CourseDepartment to public;

CREATE TABLE CourseNumber(
	courseName VARCHAR(10),
	courseNum VARCHAR(10),
	section VARCHAR(10),
	PRIMARY KEY(courseName, courseNum, section));

grant select on CourseNumber to public;

CREATE TABLE TakeSection(
	section VARCHAR(10) PRIMARY KEY,
	term VARCHAR(10))
	--FOREIGN KEY (section) REFERENCES CourseNumber(section)
	--	ON DELETE CASCADE);
		--ON UPDATE CASCADE
        
    --had to remove FK cuz it wouldn't let section be the only
    --FK cuz its not a primary key in the other entit.
    --not sure if this is allowed but its only thing that works

grant select on TakeSection to public;

CREATE TABLE DiningHall(
	DHName VARCHAR(50) PRIMARY KEY,
	residenceName VARCHAR(50) NOT NULL,
	vegAvailable NUMBER(1),
	UNIQUE(residenceName),
	FOREIGN KEY (residenceName) REFERENCES Residence);
		--ON DELETE NO ACTION
		--ON UPDATE CASCADE
    

grant select on DiningHall to public;

CREATE TABLE House(
	houseName VARCHAR(50) PRIMARY KEY,
	residenceName VARCHAR(50) NOT NULL,
	houseAddress VARCHAR(255),
	buildingType VARCHAR(20),
	isMixedGender NUMBER(1),
	hasKitchens NUMBER(1),
	FOREIGN KEY (residenceName) REFERENCES Residence);
		--ON DELETE NO ACTION
	    --ON UPDATE CASCADE
    

grant select on House to public;


CREATE TABLE FloorIdentification(
	floorID INTEGER,
	floorNumber INTEGER,
    --studentID INTEGER NOT NULL,
    PRIMARY KEY(floorID));
    --FOREIGN KEY(studentID) REFERENCES HouseMember
	--ON DELETE NO ACTION (no action is default in sqlplus)
	--ON UPDATE CASCADE
    
    --if I dont remove studentID FK it wont work 
    --cuz there is a loop dependency. Its a trivial FK 
    --either way so doesnt make a difference

grant select on FloorIdentification to public;

CREATE TABLE Room(
	floorID INTEGER NOT NULL,
	roomID INTEGER PRIMARY KEY,
    roomNumber INTEGER,
	capacity INTEGER, 
	UNIQUE(floorID, roomNumber),
	FOREIGN KEY(floorID) REFERENCES FloorIdentification
    ON DELETE CASCADE);
    --ON UPDATE CASCADE


grant select on Room to public;

CREATE TABLE HouseMember(
	studentID INTEGER PRIMARY KEY, 
	roomID INTEGER NOT NULL,
    studentName VARCHAR(50),
	gender VARCHAR(30), 
	major VARCHAR(50), 
	FOREIGN KEY(roomID) REFERENCES Room);
--ON DELETE NO ACTION
--ON UPDATE CASCADE


grant select on HouseMember to public;

CREATE TABLE FloorRA(
	studentID INTEGER PRIMARY KEY,
	houseName VARCHAR(20) NOT NULL,
	FOREIGN KEY (studentID) REFERENCES HouseMember
		ON DELETE CASCADE,
		--ON UPDATE CASCADE, (not compatible with sqlplus)
	FOREIGN KEY (houseName) REFERENCES House
		ON DELETE CASCADE);
		--ON UPDATE CASCADE
    

grant select on FloorRA to public;


CREATE TABLE RoomsWith(
	studentID1 INTEGER,
	studentID2 INTEGER,
	PRIMARY KEY(studentID1, studentID2),
	FOREIGN KEY(studentID1) REFERENCES HouseMember(studentID)
        ON DELETE CASCADE,
		--ON UPDATE CASCADE
	FOREIGN KEY(studentID2) REFERENCES HouseMember(studentID)
		ON DELETE CASCADE);
		--ON UPDATE CASCADE

grant select on RoomsWith to public;


CREATE TABLE HouseLoungeIncludes(
	houseName VARCHAR(50),
	loungeNumber INTEGER,
	foodAllowed NUMBER(1),
	PRIMARY KEY (houseName, loungeNumber),
	FOREIGN KEY (houseName) REFERENCES House
		ON DELETE CASCADE);
        --ON UPDATE CASCADE
    

grant select on HouseLoungeIncludes to public;


CREATE TABLE TakeCourse(
	courseName VARCHAR(10),
	courseNum VARCHAR(10),
	section VARCHAR(10),
	studentID INTEGER,
	PRIMARY KEY (courseName, courseNum, section, studentID),
	FOREIGN KEY (courseName, courseNum, section) REFERENCES CourseNumber
		ON DELETE CASCADE,
	FOREIGN KEY (studentID) REFERENCES HouseMember
		ON DELETE CASCADE);
		--ON UPDATE CASCADE
    

grant select on TakeCourse to public;

--FloorRA insertions:
insert into FloorRA 
values (12345678, 'Sherwood Lett');

insert into FloorRA 
values (22345678, 'Kooteny House');
 
insert into FloorRA 
values (323456789, 'North Tower');

insert into FloorRA 
values (423456789, 'Braeburn House');

insert into FloorRA 
values (523456789, 'Korea House');

--Residence insertions:
insert into Residence 
values ('Orchard Commons', '$800-1200 monthly', 1, 1);

insert into Residence 
values ('Totem Park', '$700-900 monthly', 1, 1);

insert into Residence 
values ('Walter Gage', '$800-1000 monthly', 0, 1);

insert into Residence 
values ('Place Vanier', '$800-9000 monthly', 1, 1);

--Residence insertions:
select residenceName 
from Residence
where gymAvailable = 1;