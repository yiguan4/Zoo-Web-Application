drop database if exists zoo;
create database zoo;
use zoo;

# Zoo director Table
CREATE TABLE Zoo_Director (
  	P_ID      char(6) not null,
  	P_name     varchar(15) not null,
  	P_Gender   	varchar(6),
  	Phone      char(12),
  	Email		 varchar(30),
  	P_Password   varchar(256) not null,
  	primary key (P_ID)
);

# Department Table
CREATE TABLE Department (
  D_ID      char(6) not null,
  D_name     varchar(30) not null,
  D_location  varchar(30),
  D_phone    char(12),
  P_ID      char(6),
  primary key (D_ID),
  foreign key (P_ID) references Zoo_Director(P_ID) ON DELETE CASCADE
);

# Animal Trainer Table
CREATE TABLE AT_Employee (
  	P_ID      char(6) not null,
  	P_name     varchar(15) not null,
  	P_Gender   	varchar(6),
  	Phone      char(12),
  	Email		 varchar(30),
  	P_Password   varchar(256) not null,
    D_ID       char(6) not null,
  	primary key (P_ID),
  	foreign key (D_ID) references Department(D_ID) ON DELETE CASCADE
);

# Animal Table
CREATE TABLE Animal (
	 A_ID		   char(6) not null,
    A_name      varchar(30) not null,
    A_age       varchar(10) not null,
    A_Gender     varchar(6),
    A_location   varchar(30),
    A_Status     varchar(10),
    A_Type      varchar(15),
    ZD_ID       char(6),
    AT_ID       char(6),
    primary key (A_ID),
    foreign key (ZD_ID) references Zoo_Director(P_ID) ON DELETE CASCADE,
    foreign key (AT_ID) references AT_Employee(P_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

# Visitor Employee Table
CREATE TABLE VS_Employee (
  	P_ID      char(6) not null,
  	P_name     varchar(15) not null,
  	P_Gender   	varchar(6),
  	Phone      char(12),
  	Email		 varchar(30),
  	P_Password   varchar(256) not null,
    D_ID       char(6) not null,
  	primary key (P_ID),
  	foreign key (D_ID) references department(D_ID) ON DELETE CASCADE
);

# Event Employee Table
CREATE TABLE Event_Employee (
  	P_ID      char(6) not null,
  	P_name     varchar(15) not null,
  	P_Gender   	varchar(6),
  	Phone      char(12),
  	Email		 varchar(30),
  	P_Password   varchar(256) not null,
    D_ID       char(6) not null,
  	primary key (P_ID),
  	foreign key (D_ID) references department(D_ID) ON DELETE CASCADE
);


# Visitor Table
CREATE TABLE Visitor (
  	P_ID     int not null auto_increment,
  	P_name     varchar(15) not null,
  	P_Gender   	varchar(6),
  	Phone      char(12),
  	Email		 varchar(30),
  	P_Password   varchar(256) not null,
    V_age      integer,
  	Server_ID   char(6),
  	primary key (P_ID)
  	#foreign key (Server_ID) references VS_Employee(P_ID) ON DELETE CASCADE ON UPDATE CASCADE
);


  
# Event Table
CREATE TABLE ZooEvent (
  E_ID		      char(6) not null,
  E_name	      varchar(30) not null,
  E_location 	  varchar(30),
  E_time          time,
  primary key (E_ID)
);

# Ticket Table
CREATE TABLE Ticket (
  T_ID         int auto_increment not null,
  P_ID         int not null,
  Tier_Level   char,
  primary key (T_ID, P_ID),
  foreign key (P_ID) references Visitor(P_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

# Register Table
CREATE TABLE Register (
  Visitor_ID   int not null,
  E_ID         char(6) not null,
  primary key (Visitor_ID, E_ID),
  foreign key (Visitor_ID) references Visitor(P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key (E_ID) references ZooEvent(E_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

# Organized Table
CREATE TABLE Organized (
  EE_ID        char(6) not null,
  E_ID         char(6) not null,
  primary key (EE_ID, E_ID),
  foreign key (EE_ID) references Event_Employee(P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key (E_ID) references ZooEvent(E_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

# Animal Trainer participated Table
CREATE TABLE AT_participated (
  AT_ID        char(6) not null,
  E_ID         char(6) not null,
  primary key (AT_ID, E_ID),
  foreign key (AT_ID) references AT_Employee(P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key (E_ID) references ZooEvent(E_ID) ON DELETE CASCADE ON UPDATE CASCADE
);
  
# Animal participated Table
CREATE TABLE Animal_participated (
  A_ID         char(6) not null,
  E_ID         char(6) not null,
  primary key (A_ID, E_ID),
  foreign key (A_ID) references Animal(A_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key (E_ID) references ZooEvent(E_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE Visitor AUTO_INCREMENT=1;
ALTER TABLE Ticket AUTO_INCREMENT=10000;

#password = bob123
insert into Zoo_Director values('Z10000', 'Bob', 'male', '415-366-5666', 'bob@gmail.com', '$2y$10$c3f.//7OoqHG6NJ43uOOku5.o4L/8U0LjEbzyuGzLrhRWY0ercUY6');

insert into Department values('D11111', 'Visitor System', 'Visitor office','656-787-9060','Z10000');
insert into Department values('D22222', 'Event System', 'Event office','656-787-9070','Z10000');
insert into Department values('D33333', 'Animal Trainer', 'Trainer office','656-787-9080','Z10000');

