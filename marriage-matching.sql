drop table Has_Manager
cascade constraints;
drop table Manage_MSC
cascade constraints;
drop table TravelPlan
cascade constraints;
drop table GiftPlan
cascade constraints;
drop table DatingAgency
cascade constraints;
drop table DatingClub
cascade constraints;
drop table Serves
cascade constraints;
drop table Branch_Own
cascade constraints;
drop table Customer_advises
cascade constraints;
drop table Matchmaker_manage
cascade constraints;
drop table match
cascade constraints;
drop table design
cascade constraints;


CREATE TABLE TravelPlan
(
    DocumentID INTEGER,
    Cost INTEGER,
    Preference CHAR(20),
    Style CHAR(20),
    TravelPlace CHAR(20),
    PRIMARY KEY (DocumentID)
);
grant select on TravelPlan to public;

CREATE TABLE GiftPlan
(
    DocumentID INTEGER,
    Cost INTEGER,
    Preference CHAR(20),
    Style CHAR(20),
    Type CHAR(20),
    PRIMARY KEY (DocumentID)
);
grant select on GiftPlan to public;

CREATE TABLE DatingClub
(
    ClubName CHAR(20),
    Fund INTEGER,
    AnnualFee INTEGER,
    PRIMARY KEY (ClubName)
);
grant select on DatingClub to public;

CREATE TABLE DatingAgency
(
    DA_Name CHAR(20),
    WholeMarketShare CHAR(20),
    HQbaseCountry CHAR(20),
    PRIMARY KEY (DA_Name)
);
grant select on DatingAgency to public;

CREATE TABLE Manage_MSC
(
    Name_MSC CHAR(20),
    CEO CHAR(20),
    ClubName CHAR(20),
    DA_Name CHAR(20),
    PRIMARY KEY (CEO, Name_MSC),
    FOREIGN KEY (ClubName) REFERENCES DatingClub(ClubName)
    ON DELETE CASCADE,
    FOREIGN KEY (DA_Name) REFERENCES DatingAgency(DA_Name)
    ON DELETE SET NULL
);
grant select on Manage_MSC to public;

CREATE TABLE Has_Manager
(
    ManagerID INTEGER,
    Name_MSC CHAR(20) NOT NULL,
    CEO CHAR(20) NOT NULL,
    M_Name CHAR(20),
    Workforce INTEGER,
    PRIMARY KEY (ManagerID),
    FOREIGN KEY (CEO, Name_MSC) REFERENCES Manage_MSC(CEO, Name_MSC) 
    ON DELETE CASCADE
);
grant select on Has_Manager to public;

CREATE TABLE Matchmaker_manage
(
    EmployeeID INTEGER,
    E_name CHAR(20),
    Rate INTEGER,
    ManagerID INTEGER NOT NULL,
    PRIMARY KEY (EmployeeID),
    FOREIGN KEY (ManagerID) REFERENCES Has_Manager(ManagerID) 
    ON DELETE CASCADE
);
grant select on Matchmaker_manage to public;

CREATE TABLE Customer_advises
(
    MemberID INTEGER,
    Occupation CHAR(20),
    Birthday DATE,
    Age INTEGER,
    C_name CHAR(20),
    AccessToOthersProfile CHAR(20),
    EmployeeID INTEGER,
    PRIMARY KEY (MemberID),
    FOREIGN KEY (EmployeeID) REFERENCES Matchmaker_manage(EmployeeID) 
    ON DELETE CASCADE
);
grant select on Customer_advises to public;

CREATE TABLE Serves
(
    ClubName CHAR(20),
    MemberID INTEGER,
    PRIMARY KEY (ClubName, MemberID),
    FOREIGN KEY (ClubName) REFERENCES DatingClub(ClubName)
    ON DELETE CASCADE,
    FOREIGN KEY (MemberID) REFERENCES Customer_advises(MemberID)
    ON DELETE SET NULL
);
grant select on Serves to public;

CREATE TABLE Branch_Own
(
    BranchID INTEGER,
    CityProvince CHAR(50),
    Fund INTEGER,
    BranchAddress CHAR(20),
    DA_Name CHAR(20) NOT NULL,
    PRIMARY KEY (BranchID,DA_Name),
    UNIQUE (BranchAddress),
    FOREIGN KEY (DA_Name) REFERENCES DatingAgency(DA_Name) 
    ON DELETE CASCADE
);
grant select on Branch_Own to public;

CREATE TABLE match
(
    MemberID_a INTEGER,
    MatchedDate DATE,
    MemberID_b INTEGER,
    PRIMARY KEY ( MemberID_a),
    UNIQUE (MemberID_b, MatchedDate),
    FOREIGN KEY (MemberID_a) REFERENCES Customer_advises(MemberID) 
    ON DELETE SET NULL,
    FOREIGN KEY (MemberID_b) REFERENCES Customer_advises(MemberID) 
    ON DELETE SET NULL
);
grant select on match to public;

CREATE TABLE design
(
    MemberID INTEGER,
    DocumentID INTEGER,
    StartTime DATE,
    EndTime DATE,
    PRIMARY KEY (MemberID, DocumentID),
    FOREIGN KEY (MemberID) REFERENCES Customer_advises(MemberID) 
    ON DELETE SET NULL,
    FOREIGN KEY (DocumentID) REFERENCES TravelPlan(DocumentID) 
    ON DELETE SET NULL
);
grant select on design to public;

INSERT INTO TravelPlan
VALUES(23451, 6000, '5-star hotel', 'Romantic', 'China');
INSERT INTO TravelPlan
VALUES(22112, 2000, 'Nice Food', 'Hot', 'Japan');
INSERT INTO TravelPlan
VALUES(31123 , 4000, 'Beautiful Places', 'Spicy', 'America');
INSERT INTO TravelPlan
VALUES(09887, 5000, 'Close to the sea', 'Romantic', 'America');
INSERT INTO TravelPlan
VALUES(27889, 22311, 'Helicopter', 'Luxury', 'Banff');


INSERT INTO GiftPlan
VALUES(12121, 50, 'Flowers', 'Romantic', 'Rose');
INSERT INTO GiftPlan
VALUES(21211, 40, 'Candy', 'Sweet', 'Chocolate');
INSERT INTO GiftPlan
VALUES(00110, 400000, 'Car', 'Fancy', 'Lamborghini');
INSERT INTO GiftPlan
VALUES(88921, 1500000, 'House', 'Fancy', 'Townhouse');
INSERT INTO GiftPlan
VALUES(14981, 5, 'DIYGift', 'Handmade', 'Giftcard');

INSERT INTO DatingAgency
VALUES('Huang''s Agency', 'twenty percents', 'China');
INSERT INTO DatingAgency
VALUES('Eric''s Agency', 'twenty percents', 'America');
INSERT INTO DatingAgency
VALUES('Zoey''s Agency', 'fifteen percents', 'Canada');
INSERT INTO DatingAgency
VALUES('Abbie''s Agency', 'twenty percents', 'Japan');
INSERT INTO DatingAgency
VALUES('Cindy''s Agency', 'twenty-five percents', 'Singapore');
INSERT INTO DatingAgency
VALUES('Julia''s Agency', 'twenty-five percents', 'Canada');
INSERT INTO DatingAgency
VALUES('John''s Agency', 'twenty percents', 'Canada');
INSERT INTO DatingAgency
VALUES('Williams''s Agency', 'twenty-five percents', 'China');
INSERT INTO DatingAgency
VALUES('Sara''s Agency', 'fifteen percents', 'China');
INSERT INTO DatingAgency
VALUES('Lucia''s Agency', 'fifteen percents', 'Japan');
INSERT INTO DatingAgency
VALUES('Amy''s Agency', 'twenty-five percents', 'Japan');

INSERT INTO DatingClub
VALUES('Huang''s Club', 100000, 50);
INSERT INTO DatingClub
VALUES('Eric''s Club', 100000, 100);
INSERT INTO DatingClub
VALUES('Zoey''s Club', 200000, 50);
INSERT INTO DatingClub
VALUES('Cindy''s Club', 500000, 80);
INSERT INTO DatingClub
VALUES('Abbie''s Club', 50000, 150);

INSERT INTO Manage_MSC
VALUES('Huang''s Marriage.Co', 'Steven Huang', 'Huang''s Club', 'Huang''s Agency');
INSERT INTO Manage_MSC
VALUES('Eric''s Marriage.Co', 'Eric Lyu', 'Eric''s Club', 'Eric''s Agency');
INSERT INTO Manage_MSC
VALUES('Zoey''s Marriage.Co', 'Zoey Li', 'Zoey''s Club', 'Zoey''s Agency');
INSERT INTO Manage_MSC
VALUES('Abbie''s Marriage.Co', 'Abbie Wen', 'Abbie''s Club', 'Abbie''s Agency');
INSERT INTO Manage_MSC
VALUES('Cindy''s Marriage.Co', 'Cindy Li', 'Huang''s Club', 'Huang''s Agency');

INSERT INTO Has_Manager
VALUES(45876, 'Huang''s Marriage.Co', 'Steven Huang', 'Patrick Huang', 20);
INSERT INTO Has_Manager
VALUES(23342, 'Huang''s Marriage.Co', 'Steven Huang', 'Lisa Ma', 15);
INSERT INTO Has_Manager
VALUES(33213, 'Huang''s Marriage.Co', 'Steven Huang', 'Mark Li', 12);
INSERT INTO Has_Manager
VALUES(15876, 'Huang''s Marriage.Co', 'Steven Huang', 'Luna Iy', 5);
INSERT INTO Has_Manager
VALUES(22334, 'Huang''s Marriage.Co', 'Steven Huang', 'Donald Trump', 40);

INSERT INTO Matchmaker_manage
VALUES(10011, 'Mary', 8, 15876);
INSERT INTO Matchmaker_manage
VALUES(21030, 'Mike', 9, 22334);
INSERT INTO Matchmaker_manage
VALUES(11220, 'Olivia', 6, 33213);
INSERT INTO Matchmaker_manage
VALUES(30102, 'Mia', 7, 45876);
INSERT INTO Matchmaker_manage
VALUES(41100, 'William', 10, 22334);

INSERT INTO Customer_advises
VALUES(22331, 'Driver', '09-FEB-78', 42, 'Lisa Wu', 'True', 10011);
INSERT INTO Customer_advises
VALUES(22330, 'Professor', '19-FEB-79', 41, 'Amy Keri', 'True', 41100);
INSERT INTO Customer_advises
VALUES(98872, 'Police', '13-FEB-80', 40, 'Amanda Wu', 'False', 10011);
INSERT INTO Customer_advises
VALUES(09876, 'Biochemical Engineer', '01-FEB-77', 43, 'Dina Liu', 'True', 30102);
INSERT INTO Customer_advises
VALUES(11442, 'Computer Engineer', '30-MAR-79', 41, 'Alice Sun', 'True', 21030);
INSERT INTO Customer_advises
VALUES(09877, 'Police', '02-APR-73', 47, 'John Wu', 'True', 30102);
INSERT INTO Customer_advises
VALUES(12358, 'Professor', '08-JUL-97', 21, 'Yuntao Wu', 'True', 21030);
INSERT INTO Customer_advises
VALUES(12136, 'Youtuber', '10-DEC-88', 32, 'Tony Kim', 'False', 41100);
INSERT INTO Customer_advises
VALUES(12001, 'Computer Engineer', '19-NOV-86', 21, 'Maxon Zhao', 'True', 41100);
INSERT INTO Customer_advises
VALUES(11898, 'Accountant', '11-JUL-92', 31, 'Cindy Huang', 'True', 21030);
INSERT INTO Customer_advises
VALUES(10008, 'Accountant', '18-JUN-02', 21, 'Juliana Furtado', 'True', 21030);
INSERT INTO Customer_advises
VALUES(11285, 'Pilot', '07-JAN-94', 26, 'Nicolas Ng', 'True', 30102);

INSERT INTO Serves
VALUES('Huang''s Club', 22331);
INSERT INTO Serves
VALUES('Eric''s Club', 12001);
INSERT INTO Serves
VALUES('Zoey''s Club', 11285);
INSERT INTO Serves
VALUES('Cindy''s Club', 09877);
INSERT INTO Serves
VALUES('Abbie''s Club', 12136);

INSERT INTO Branch_Own
VALUES(101, 'Vancouver, BC', 500000, '1100 W Broadway', 'Cindy''s Agency');
INSERT INTO Branch_Own
VALUES(127, 'Vancouver, BC', 800000, '1529 W 6th Ave', 'Eric''s Agency');
INSERT INTO Branch_Own
VALUES(221, 'Ottawa, ON', 800000, '1142 Bank St', 'Abbie''s Agency');
INSERT INTO Branch_Own
VALUES(001, 'Ottawa, ON', 200000, '161 Flora St', 'Zoey''s Agency');
INSERT INTO Branch_Own
VALUES(541, 'Toronto, ON', 500000, '8 King St E', 'Huang''s Agency');

INSERT INTO match
VALUES(11285, '01-OCT-20', 12001);
INSERT INTO match
VALUES(12136, '09-AUG-19', 11898);
INSERT INTO match
VALUES(11442, '03-SEP-20', 09877);
INSERT INTO match
VALUES(12358, '20-OCT-20', 22331);
INSERT INTO match
VALUES(98872, '03-FEB-20', 09876);

INSERT INTO design
VALUES(98872, 22112, '03-MAY-19', '09-MAY-19');
INSERT INTO design
VALUES(11442, 31123, '01-MAR-20', '06-MAR-20');
INSERT INTO design
VALUES(11898, 23451, '20-DEC-19', '09-JAN-20');
INSERT INTO design
VALUES(11285, 09887, '20-DEC-19', '13-JAN-20');
INSERT INTO design
VALUES(12001, 27889, '09-JAN-20', '23-JAN-20');