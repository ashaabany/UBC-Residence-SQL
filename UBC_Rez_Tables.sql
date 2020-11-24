drop table TakeCourse CASCADE constraints;
drop table HouseLoungeIncludes CASCADE constraints;
drop table RoomsWith CASCADE constraints;
drop table StudentHouse CASCADE constraints;
drop table HouseMember CASCADE constraints;
drop table Room CASCADE constraints;
drop table FloorIdentification CASCADE constraints;
drop table House CASCADE constraints;
drop table DiningHall CASCADE constraints;
drop table TakeSection CASCADE constraints;
drop table courseNumber CASCADE constraints;
drop table CourseDepartment CASCADE constraints;
drop table ResidenceCoordinator CASCADE constraints;
drop table Residence CASCADE constraints;





CREATE TABLE Residence
(
	residenceName VARCHAR(50) PRIMARY KEY,
	minPrice INTEGER,
	gymAvailable NUMBER(1),
	studySpaceAvailable NUMBER(1)
);

grant select on Residence to public;

CREATE TABLE ResidenceCoordinator
(
	RCID INTEGER PRIMARY KEY,
	residenceName VARCHAR(50) NOT NULL,
	RCName VARCHAR(50),
	RCPhone VARCHAR(20),
	FOREIGN KEY (residenceName) REFERENCES Residence
);
--ON DELETE NO ACTION
--ON UPDATE CASCADE


grant select on ResidenceCoordinator to public;


CREATE TABLE CourseDepartment
(
	courseName VARCHAR(10) PRIMARY KEY,
	department VARCHAR(50)
);

grant select on CourseDepartment to public;

CREATE TABLE CourseNumber
(
	courseName VARCHAR(10),
	courseNum VARCHAR(10),
	section VARCHAR(10),
	PRIMARY KEY(courseName, courseNum, section)
);

grant select on CourseNumber to public;

CREATE TABLE TakeSection
(
	section VARCHAR(10) PRIMARY KEY,
	term VARCHAR(10)
)
--FOREIGN KEY (section) REFERENCES CourseNumber(section)
--	ON DELETE CASCADE);
--ON UPDATE CASCADE

--had to remove FK cuz it wouldn't let section be the only
--FK cuz its not a primary key in the other entit.
--not sure if this is allowed but its only thing that works

grant select on TakeSection to public;

CREATE TABLE DiningHall
(
	DHName VARCHAR(50) PRIMARY KEY,
	residenceName VARCHAR(50) NOT NULL,
	vegAvailable NUMBER(1),
	UNIQUE(residenceName),
	FOREIGN KEY (residenceName) REFERENCES Residence
);
--ON DELETE NO ACTION
--ON UPDATE CASCADE


grant select on DiningHall to public;

CREATE TABLE House
(
	houseName VARCHAR(50) PRIMARY KEY,
	residenceName VARCHAR(50) NOT NULL,
	houseAddress VARCHAR(255),
	buildingType VARCHAR(20),
	isMixedGender NUMBER(1),
	hasKitchens NUMBER(1),
	FOREIGN KEY (residenceName) REFERENCES Residence
);
--ON DELETE NO ACTION
--ON UPDATE CASCADE


grant select on House to public;


CREATE TABLE FloorIdentification
(
	floorID INTEGER,
	floorNumber INTEGER,
	--studentID INTEGER NOT NULL,
	PRIMARY KEY(floorID)
);
--FOREIGN KEY(studentID) REFERENCES HouseMember
--ON DELETE NO ACTION (no action is default in sqlplus)
--ON UPDATE CASCADE

--if I dont remove studentID FK it wont work 
--cuz there is a loop dependency. Its a trivial FK 
--either way so doesnt make a difference

grant select on FloorIdentification to public;

CREATE TABLE Room
(
	floorID INTEGER NOT NULL,
	roomID INTEGER PRIMARY KEY,
	roomNumber INTEGER,
	UNIQUE(floorID, roomNumber),
	FOREIGN KEY(floorID) REFERENCES FloorIdentification
    ON DELETE CASCADE
);
--ON UPDATE CASCADE


grant select on Room to public;

CREATE TABLE HouseMember
(
	studentID INTEGER PRIMARY KEY,
	roomID INTEGER NOT NULL,
	age INTEGER,
	studentName VARCHAR(50),
	gender VARCHAR(30),
	major VARCHAR(50),
	FOREIGN KEY(roomID) REFERENCES Room
);
--ON DELETE NO ACTION
--ON UPDATE CASCADE


grant select on HouseMember to public;

CREATE TABLE StudentHouse
(
	studentID INTEGER PRIMARY KEY,
	houseName VARCHAR(20) NOT NULL,
	FOREIGN KEY (studentID) REFERENCES HouseMember
		ON DELETE CASCADE,
	--ON UPDATE CASCADE, (not compatible with sqlplus)
	FOREIGN KEY (houseName) REFERENCES House
		ON DELETE CASCADE
);
--ON UPDATE CASCADE


grant select on StudentHouse to public;


CREATE TABLE RoomsWith
(
	studentID1 INTEGER,
	studentID2 INTEGER,
	PRIMARY KEY(studentID1, studentID2),
	FOREIGN KEY(studentID1) REFERENCES HouseMember(studentID)
        ON DELETE CASCADE,
	--ON UPDATE CASCADE
	FOREIGN KEY(studentID2) REFERENCES HouseMember(studentID)
		ON DELETE CASCADE
);
--ON UPDATE CASCADE

grant select on RoomsWith to public;


CREATE TABLE HouseLoungeIncludes
(
	houseName VARCHAR(50),
	loungeNumber INTEGER,
	foodAllowed NUMBER(1),
	PRIMARY KEY (houseName, loungeNumber),
	FOREIGN KEY (houseName) REFERENCES House
		ON DELETE CASCADE
);
--ON UPDATE CASCADE


grant select on HouseLoungeIncludes to public;


CREATE TABLE TakeCourse
(
	courseName VARCHAR(10),
	courseNum VARCHAR(10),
	section VARCHAR(10),
	studentID INTEGER,
	PRIMARY KEY (courseName, courseNum, section, studentID),
	FOREIGN KEY (courseName, courseNum, section) REFERENCES CourseNumber
		ON DELETE CASCADE,
	FOREIGN KEY (studentID) REFERENCES HouseMember
		ON DELETE CASCADE
);
--ON UPDATE CASCADE

grant select on TakeCourse to public;

--Residence insertions:
insert into Residence
values
	('Orchard Commons', 800, 1, 1);

insert into Residence
values
	('Totem Park', 700, 1, 1);

insert into Residence
values
	('Walter Gage', 800, 0, 1);

insert into Residence
values
	('Place Vanier', 800, 1, 1);

insert into Residence
values
	('Fairview Crescent', 600, 0, 1);

-- ResidenceCoordinator insertions:
insert into ResidenceCoordinator
values('007007007', 'Orchard Commons', 'James Bond', '604-007-0077')

insert into ResidenceCoordinator
values('12345678', 'Totem Park', 'Peter Parker', '604-139-4123')

insert into ResidenceCoordinator
values('32432423', 'Place Vanier', 'Leonardo Dicaprio', '604-132-4352')

insert into ResidenceCoordinator
values('75647436', 'Walter Gage', 'Fake Name', '604-132-2222')

insert into ResidenceCoordinator
values('86574534', 'Walter Gage', 'Real Name', '604-333-4352')


--CourseDepartment insertions:
insert into CourseDepartment
values('CPSC', 'Department of Computer Science');

insert into CourseDepartment
values('PSYC', 'Department of Psychology');

insert into CourseDepartment
values('CHEM', 'Department of Chemistry');

insert into CourseDepartment
values('PHYS', 'Department of Physiology');

insert into CourseDepartment
values('BIOL', 'Department of Biology');

--CourseNumber insertions:
insert into CourseNumber
values('CPSC', '110', '201');

insert into CourseNumber
values('CPSC', '304', '101');

insert into CourseNumber
values('CPSC', '304', '102');

insert into CourseNumber
values('PSYC', '365', '911');

insert into CourseNumber
values('CHEM', '123', '921');


-- TakeSection insertions:
insert into TakeSection
values('101', 'Winter 1');

insert into TakeSection
values('102', 'Winter 1');

insert into TakeSection
values('201', 'Winter 2');

insert into TakeSection
values('911', 'Summer 1');

insert into TakeSection
values('921', 'Summer 2');


-- DiningHall insertions:
insert into DiningHall
values('Open Kitchen', 'Orchard Commons', 1);

insert into DiningHall
values('Feast', 'Totem Park', 1);

insert into DiningHall
values('Gather', 'Place Vanier', 1);

insert into DiningHall
values('Fake Dining Hall 1', 'Walter Gage', 0);

insert into DiningHall
values('Fake Dining Hall 2', 'Fairview Crescent', 1);


-- House insertions:
insert into House
values('Braeburn House', 'Orchard Commons', '6363 Agronomy Rd, Vancouver, BC V6T 1Z4', 'Apartment', 1, 0);

insert into House
values('Hemlesem', 'Totem Park', '2525 West Mall, Vancouver, BC V6T 1W9', 'Apartment', 1, 0);

insert into House
values('North Tower', 'Walter Gage', '5959 Student Union Blvd, Vancouver, BC V6T 2C9', 'Apartment', 1, 1);

insert into House
values('Fairview Crescent', 'Fairview Crescent', '2600-2804 Fairview Crescent, Vancouver, BC V6T 2B9', 'Townhouse', 1, 1);

insert into House
values('Ross House', 'Place Vanier', '1935 Lower Mall, Vancouver, BC V6T 1X1', 'Apartment', 0, 0);

insert into House
values('Sherwood Lett House', 'Place Vanier', '1935 Lower Mall, Vancouver, BC V6T 1X1', 'Apartment', 1, 0);



--FloorIdentification insertions:
--floorID have 4 digits
insert into FloorIdentification
values(1234, 4);

insert into FloorIdentification
values(2234, 6);

insert into FloorIdentification
values(3234, 1);

insert into FloorIdentification
values(4234, 0);

insert into FloorIdentification
values(5234, 15);



--Room insertions:
--RoomID have 5 digits
insert into Room
values(1234, 54321, 421);

insert into Room
values(1234, 11111, 420);

insert into Room
values(1234, 54211, 455);

insert into Room
values(2234, 24121, 601);

insert into Room
values(5234, 59321, 1504);

insert into Room
values(4234, 54621, 007);

--HouseMember insertions: 
-- Ahmed Shaaban rooms with Edward Lin
-- Navid rooms with Edward Liu
insert into HouseMember
values(12345678, 54621, 23, 'Ahmed Shaaban', 'Male', 'Cognitive Systems');

insert into HouseMember
values(12345679, 54621, 21, 'Edward Lin', 'Non-Binary', 'Cognitive Systems');

insert into HouseMember
values(46245678, 24121, 21, 'Navid', 'Male', 'Computer Science');

insert into HouseMember
values(12346731, 54321, 18, 'Annika Johnson', 'Female', 'Political Science');

insert into HouseMember
values(14348679, 24121, 25, 'Edward Liu', 'Male', 'Earth and Ocean Science');

insert into HouseMember
values(15248333, 24121, 25, 'Elena Mclovin', 'Female', 'Media Studies');

insert into HouseMember
values(14348999, 11111, 22, 'meow Liu', 'Male', 'Earth and Ocean Science');

insert into HouseMember
values(15248444, 11111, 30, 'bark Mclovin', 'Female', 'Media Studies');


--StudentHouse insertions:
insert into StudentHouse
values
	(15248333, 'Braeburn House');

insert into StudentHouse
values
	(12346731, 'North Tower');

insert into StudentHouse
values
	(46245678, 'Braeburn House');

insert into StudentHouse
values
	(14348679, 'Braeburn House');

insert into StudentHouse
values
	(12345678, 'Ross House');

insert into StudentHouse
values
	(12345679, 'Ross House');




--RoomsWith insertions:
insert into RoomsWith
values(12345678, 12345679);

insert into RoomsWith
values(46245678, 14348679);

insert into RoomsWith
values(14348999, 15248444);




-- HouseLoungeIncludes insertions:
insert into HouseLoungeIncludes
values('Braeburn House', 301, 1);

insert into HouseLoungeIncludes
values('Braeburn House', 401, 1);

insert into HouseLoungeIncludes
values('Ross House', 201, 1);

insert into HouseLoungeIncludes
values('North Tower', 121, 1);

insert into HouseLoungeIncludes
values('Fairview Crescent', 201, 1);



-- TakeCourse insertions:
insert into TakeCourse
values('CPSC', '304', '101', 12345678);

insert into TakeCourse
values('CPSC', '304', '101', 12345679);

insert into TakeCourse
values('CPSC', '110', '201', 12345679);

insert into TakeCourse
values('CPSC', '110', '201', 46245678);

insert into TakeCourse
values('PSYC', '365', '911', 12345678);

insert into TakeCourse
values('PSYC', '365', '911', 12345679);

insert into TakeCourse
values('CHEM', '123', '921', 46245678);

insert into TakeCourse
values('PSYC', '365', '911', 12346731);

