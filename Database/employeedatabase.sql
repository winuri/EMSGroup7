create database EmployeeDatabase;

use  EmployeeDatabase;

create table user(
user_ID varchar(20) NOT NULL PRIMARY KEY,
UserName varchar(255),
Password varchar(20)

);



INSERT INTO user 
VALUES ('S234','chamara','98458657V@'),
('A456','Dilshan','43782918%hg'),
('ad672','Lahiru','M/45!ndh34');


 create table report(
 report_ID INT PRIMARY KEY,
 name varchar(50),
 issue_date date
 );
 
 insert into report values
 (32, 'Surface Cleaning Tools Report','2022-12-31'),
 (33, 'Floor Cleaning Tools Report', '2022-11-30')
 ;
 insert into report values
 (51,'Salary','2023-01-31');
 
 
  create table Inventory(
 Tool_ID varchar(10) NOT NULL PRIMARY KEY,
 Tool_name varchar(100),
 Price double,
 Quantity int,
 purchase_date date,
 report_ID int,
 foreign key(report_ID) references report(report_ID)
 );
 
 drop table inventory;
 
  insert into Inventory values
 ('T123','Surface Cleaning Tools','1000.00','10','2022-12-13','32'),
 ('T678','Floor Cleaning Tools','3000.00','7','2022-11-23','33');


 
 create table WorkPlace(
 work_ID varchar(10) NOT NULL PRIMARY KEY,
 Address varchar(50),
 name varchar(255)
 );
 
  insert into WorkPlace values
 ('w01','Anuradhapura Town','Main Branch'),
 ('W34','Main street, Mtale','Telecom - Mathale'),
 ('W78','Udaya Mawatha, Anuradhapura','Telecom OPMC - Anuradhapura'),
 ('W09','Hospital Road, Mannar','CEB - Mannar');

 
  create table Attendance(
 A_ID varchar(10) NOT NULL PRIMARY KEY,
 Date date,
 Name varchar(50),
 Arrival_time time,
 Leave_time time,
 report_ID int,
foreign key(report_ID) references report(report_ID)
) ;

alter table attendance add status varchar(10);

insert into Attendance values
 ('A1','2022-08-02','Viviyan Rajapaksha','08:00:00','04:00:00',12),
 ('A2','2022-03-02','Kirthirathna.B.D','08:01:00','04:00:00',12),
 ('A3','2022-09-02','Ashoka.A.K.K','08:00:00','04:00:00',12);
 

 
 create table Leaves(
 L_ID varchar(10) NOT NULL PRIMARY KEY,
 description varchar(1000),
 count int
 );
 
 insert into Leaves values
 ('L12','Sick Leave',3),
 ('L13','casual leave',2),
 ('L14','Sick Leave',1);

create table salary(
 Position varchar(100),
 Year int,
 Month varchar(10),
 deduction int,
 allowances int,
Payment_methods varchar(20),
report_ID int,
  foreign key(report_ID) references report(report_ID)
 );
 
 insert INTO salary values 
('Supervisor',2022,'January',1000.00,3000.00,'cash',51),
('Accountant',2023,'January',2000.00,2000.00,'Bank',51),
('Supervisor',2023,'January',7000.00,1000.00,'Bank',51);
 
 
 create table supervisor(
 S_ID int AUTO_INCREMENT PRIMARY KEY ,
 L_ID varchar(10),
 A_ID varchar(10),
 EMP_ID int,
 foreign key(L_ID) references Leaves(L_ID),
 foreign key(A_ID) references Attendance(A_ID),
 foreign key(EMP_ID) references Employee(EMP_ID)
);

drop table supervisor;

create table accountant(
 acc_ID varchar(10) NOT NULL  PRIMARY KEY, 
 EMP_ID INT,
 L_ID varchar(10),
 A_ID varchar(10),
 foreign key(L_ID) references Leaves(L_ID),
 foreign key(A_ID) references Attendance(A_ID),
 foreign key(EMP_ID) references Employee(EMP_ID)
);
drop table accountant;

CREATE TABLE labour (
  lb_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  EMP_ID INT,
  L_ID varchar(10),
  A_ID varchar(10),
  foreign key(EMP_ID) references Employee(EMP_ID),
  foreign key(L_ID) references Leaves(L_ID),
   foreign key(A_ID) references Attendance(A_ID)
);
 Drop table employee;
  Drop table supervisor;
 Drop table accountant;
 Drop table labour;

 CREATE TABLE Employee (
  EMP_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Member_No int,
  F_name VARCHAR(20),
  L_name VARCHAR(20),
  NIC VARCHAR(20) NOT NULL,
  Mobile INT,
  Gender VARCHAR(10),
  DOB DATE,
  Acc_no INT,
  B_name VARCHAR(10),
  acc_ID VARCHAR(10),
  work_ID VARCHAR(10),
  FOREIGN KEY (work_ID) REFERENCES WorkPlace(work_ID)
);
ALTER TABLE Employee
modify COLUMN Acc_no varchar(50);
 
 ALTER TABLE Employee
DROP COLUMN acc_ID;
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /*
 
  create table labour(
 l_ID varchar(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 F_name varchar(20),
 L_name varchar(20),
  NIC varchar(20) NOT NULL,
 Mobile int,
 Gender varchar(10),
 DOB date,
 Acc_no int(20),
 B_name varchar(10)
 );
 
  INSERT INTO labour 
VALUES ('L895','Ramyalatha.K.G.H','','746211520V','','','','',''),
('L209','Robat.M.D','','196016303760','','','','',''),
('L256','Herath.D.G.M','','706396438V','','','','',''),
('L256','Chandra Gunasingha.R','','196957401863','','','','',''),
('L190','Manel.H.A','','737323218V','','','','',''),
('L342','Nihal.T.E.L','','196015010100','','','','',''),
('L429','Donald.D.P','','196508603003','','','','',''),
('L902','Sriyani Samarathunga.U.M.G','','815811348V','','','','',''),
('L729','Darshani.A.M.P','','808344653V','','','','',''),
('L490','Herath.H.M.T','','715191393V','','','','',''),
('L156','Kusuma Chandralatha.U.B','','196760641631','','','','',''),
('L467','Sriyani Kumari.J.J.A','','197975401184','','','','',''),
('L678','Karunawathi.K.M','','696623848V','','','','',''),
('L678','Mallika.J.A.K','','678263036V','','','','',''),
('L345','Ashoka.A.K.K','','663151584V','','','','',''),
('L890','Abekon Banda.A.M','','196723501570','','','','',''),
('L939','Kirthirathna.B.D','','561414696V','','','','',''),
('L936','Viviyan Rajapaksha','','607895210V','','','','','');



 create table accountant(
 acc_ID varchar(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 F_name varchar(20),
 L_name varchar(20),
  NIC varchar(20) NOT NULL,
 Mobile int,
 Gender varchar(10),
 DOB date,
 Acc_no int(20),
 B_name varchar(10),
 foreign key(report_ID) references report(report_ID),
 foreign key(EMP_ID) references Employee(EMP_ID)
 );
 
 insert into accountant values
 ('A123','winuri','disanayake','753789022V','071234567','Female','2000/2/24','765478023109','Peoples Bank');

 
 create table supervisor(
 S_ID int AUTO_INCREMENT PRIMARY KEY ,
 F_name varchar(20),
 L_name varchar(20),
  NIC varchar(20) NOT NULL,
 Mobile int,
 Gender varchar(10),
 DOB date,
 Acc_no int(20),
 B_name varchar(10),
 foreign key(Tool_ID) references Inventory(Tool_ID),
 foreign key(L_ID) references Leaves(L_ID),
 foreign key(A_ID) references Attendance(A_ID),
 foreign key(report_ID) references report(report_ID)
 );
 
  insert into supervisor values
 ('S123','kamal','Rathanayke','8739034V','071234567','male','','76234907652','BOC');

*/

 

 
 
 

 
