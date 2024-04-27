create database EMSDatabase;

use  EMSDatabase;

create table user(
user_ID varchar(20) NOT NULL PRIMARY KEY,
UserName varchar(255),
Password varchar(20)

);

INSERT INTO user 
VALUES ('S234','chamara','98458657V@'),
('A456','Dilshan','43782918%hg'),
('ad672','Lahiru','M/45!ndh34');


create table Positions(
Position_ID int not null auto_increment primary key,
Position_name varchar(50)
);


insert into Positions values
('01','Supervisor'),
('02','Labour'),
('03','Accountant');


create table WorkPlace(
 work_ID int NOT NULL auto_increment PRIMARY KEY,
 Address varchar(255),
 name varchar(100)
 );
 
  insert into WorkPlace values
 ('001','Anuradhapura Town','Main Branch'),
 ('002','Main street, Mtale','Telecom - Mathale'),
 ('003','Udaya Mawatha, Anuradhapura','Telecom OPMC - Anuradhapura'),
 ('004','Hospital Road, Mannar','CEB - Mannar'),
 ('005','249 B, Rex Building, Main St, Anuradhapura','Toyota - Anuradhapura'),
 ('006','Kandy Road, Kurunegala','Telecom - Kurunegala'),
 ('007','Thisa wewa, Anuradhapura','Water board - Thisa wewa'),
 ('008','Inner harbour Road, Trincomalee', 'Telecom - Trincomalee')
 ;


CREATE TABLE Employee (
  EMP_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Member_No int not null,
  F_name VARCHAR(20),
  L_name VARCHAR(20),
  NIC VARCHAR(20) NOT NULL,
  Mobile INT,
  Gender VARCHAR(10),
  Address varchar(100),
  DOB DATE,
  Position_ID int,
  work_ID int,
  Pay_ID int,
  foreign key(Pay_ID) references PayMethod(Pay_ID),
  foreign key(Position_ID) references Positions(Position_ID),
  foreign key(work_ID) references WorkPlace(work_ID)
);


create table report(
 report_ID int not null auto_increment primary key,
 name varchar(50),
 issue_date date
 );
 
 insert into report values
 ('001', 'Surface Cleaning Tools Report','2022-12-31'),
 ('002', 'Floor Cleaning Tools Report', '2022-11-30'),
 ('003','Salary','2023-01-31');
 
 insert into report values
 ('004','Attendance','2023-08-30');
 
create table BankDetails(
Bank_ID int not null auto_increment primary key,
Bank_Name varchar(50)
);

insert into BankDetails values
(01,'Amana Bank PLC'),
(02,'Asia Asset Finance PLC'),
(03,'Axis Bank'),
(04,'Bank of Ceylon'),
(05,'Cargills Bank limited'),
(06,'ICICI Bank Ltd'),
(07,'Central Finance PLC'),
(08,'Citi Bank'),
(09,'Citizen Development Business Finance PLC'),
(10,'Commercial Bank PLC'),
(11,'Commercial Credit & Finance PLC'),
(12,'Commercial Leasing and Finance'),
(13,'Deutsche Bank'),
(14,'DFCC Bank PLC'),
(15,'Dialog Finance PLC'),
(16,'Fintrex Finance Limited'),
(17,'Habib Bank Ltd'),
(18,'Hatton National Bank PLC'),
(19,'HDFC Bank'),
(20,'Lanka Orix Finance PLC'),
(21,'LB Finance PLC'),
(22,'MCB Bank'),
(23,'National Development Bank PLC'),
(24,'National Savings Bank'),
(25,'Nations Trust Bank PLC'),
(26,'Pan Asia Banking Cooporation PLC'),
(27,'Peoples Bank'),
(28,'Peoples Leasing $ Finance PLC'),
(29,'Regional Development Bank'),
(30,'Richard Pieris Finance PLC'),
(31,'Sampath Bank PLC'),
(32,'Sanasa Development Bank'),
(33,'Sarvodaya Development Finance'),
(34,'Seylan Bank PLC'),
(35,'Sri Lanka Operations Public Bank')
;

create table AccountDetails(
Acc_ID int not null auto_increment primary key,
Acc_No numeric(20),
Bank_ID int,
EMP_ID int,
foreign key(EMP_ID) references Employee(EMP_ID),
foreign key(Bank_ID) references BankDetails(Bank_ID)
);

insert into AccountDetails values
(0001,201200110017666,27,1),
(0002,207200165900279,27,2)
;


create table Leaves(
 L_ID varchar(10) NOT NULL PRIMARY KEY,
 description varchar(1000),
 count int
 );
 
 insert into Leaves values
 ('L12','Sick Leave',3),
 ('L13','casual leave',2),
 ('L14','Sick Leave',1);
 
 
  create table Attendance(
 A_ID int NOT NULL PRIMARY KEY,
 Date date,
 Name varchar(50),
 Arrival_time time,
 Leave_time time,
 report_ID int,
 status varchar(10),
foreign key(report_ID) references report(report_ID)
) ;

insert into Attendance values
 ('001','2022-08-02','Viviyan Rajapaksha','08:00:00','04:00:00',004,'Present'),
 ('002','2022-08-02','Kirthirathna.B.D','08:01:00','04:00:00',004,'Present'),
 ('003','2022-08-02','Ashoka.A.K.K','08:00:00','04:00:00',004,'Present');
 

 create table Inventory(
 Tool_ID varchar(10) NOT NULL PRIMARY KEY,
 Tool_name varchar(100),
 Price double,
 Quantity int,
 purchase_date date,
 report_ID int,
 foreign key(report_ID) references report(report_ID)
 );
 
  insert into Inventory values
 ('T001','Surface Cleaning Tools','1000.00','10','2022-12-13','001'),
 ('T002','Floor Cleaning Tools','3000.00','7','2022-11-23','002');

create table PayMethod(
Pay_ID int not null primary key,
Pay_name varchar(20) 
);

insert into PayMethod values
('01','By Cash'),
('02','By Deposit')
;