USE CS3380GRP15;
CREATE TABLE Employees 
(
	username VARCHAR(12) NOT NULL,
	first_name VARCHAR(15),
	last_name VARCHAR(20),
	admin_rights BOOLEAN,
    Ausername VARCHAR(12) NOT NULL,
	PRIMARY KEY (username),
    FOREIGN KEY (Ausername) REFERENCES Authentication(Authusername)
);
CREATE TABLE Authentication 
(
	Authusername VARCHAR(12) NOT NULL,
	password VARCHAR(20),
	type VARCHAR(20),
	PRIMARY KEY(Authusername)
);
CREATE TABLE Administrator 
(
	username VARCHAR(12) NOT NULL,
	PRIMARY KEY (username),
	FOREIGN KEY (username) REFERENCES Authentication(Authusername)
);
CREATE TABLE Pilot 
(
	username VARCHAR(12) NOT NULL,
	rank BOOLEAN,
	pilot_status BOOLEAN,
	total_flyingHours INT,
	PRIMARY KEY (username),
	FOREIGN KEY (username) REFERENCES Authentication(Authusername)
);
CREATE TABLE FlightAttendant 
(
	username VARCHAR(12) NOT NULL,
	rank BOOLEAN,
    status BOOLEAN,
	PRIMARY KEY (username),
	FOREIGN KEY (username) REFERENCES Authentication(Authusername)
);
CREATE TABLE Equipment 
(
	plane_id int NOT NULL,
	seating_capacity int,
	num_pilots int,
	num_attendants int,
	plane_type varchar(40),
	PRIMARY KEY (plane_id)
);
CREATE TABLE Flights
(
	flight_id int NOT NULL,
	flight_date datetime,
	plane_id int,
	pilot_id VARCHAR(12),
	attendant_id int,
    departure_date VARCHAR(10),
    departure_time TIME,
    departure_loc VARCHAR(30),
    destination_loc VARCHAR(30),
    arrival_time TIME,
    arrival_date VARCHAR(10),
    price_of_flight VARCHAR(10),
	PRIMARY KEY(flight_id),
	FOREIGN KEY (pilot_id) REFERENCES Pilot(username),
	FOREIGN KEY (plane_id) REFERENCES Equipment(plane_id),
	FOREIGN KEY (attendant_id) REFERENCES FlightAttendant(username)
);

CREATE TABLE PilotEquipment 
(
	username VARCHAR(12) NOT NULL,
	plane_id INT,
	PRIMARY KEY (username),
    FOREIGN KEY (username) REFERENCES Pilot (username),
	FOREIGN KEY (plane_id) REFERENCES Equipment(plane_id)
);

CREATE TABLE Reservation
(
	reservation_id int NOT NULL,
    flight_id int,
    num_bag int,
    PRIMARY KEY (reservation_id),
    FOREIGN KEY (flight_id) REFERENCES Flights(flight_id),
    FOREIGN KEY (username) REFERENCES Customer(username)
);
CREATE TABLE Customer
(
	username varchar(12) NOT NULL,
    f_name varchar(12),
    l_name varchar(12),
    age int,
    PRIMARY KEY (username),
    FOREIGN KEY (username) REFERENCES Authentication(Authusername)
);
CREATE TABLE Log 
(
    log_id INT NOT NULL,
    ip_address INT,
    action_time TIME,
    action_date DATE,
    action_type VARCHAR(50),
    username VARCHAR(12),
    PRIMARY KEY log_id,
    FOREIGN KEY (username) REFERENCES Authentication(Authusername)
);



