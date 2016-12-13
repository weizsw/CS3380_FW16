CREATE TABLE PATIENT (
	pat_idnumber integer,
	pat_firstname varchar(50),
	pat_lastname varchar(50),
	pat_address varchar(50),
	pat_city varchar(50),
	pat_state varchar(50),
	PRIMARY KEY(pat_idnumber)
);

CREATE TABLE DOCTOR (
	doc_physicianidnumber integer,
	doc_firstname varchar(50),
	doc_lastname varchar(50),
	PRIMARY KEY(doc_physicianidnumber)
);

CREATE TABLE BILL (
	bill_number integer,
	bill_amountiinsured float(3),
	bill_amountnotinsured float(3),
	bill_datesent date,
	bill_status varchar(50),
	PRIMARY KEY(bill_number)
);

CREATE TABLE APPOINTMENT (
	app_date date,
	app_time time(0),
	app_duration time(0),
	app_reason varchar(50),
	pat_idnumber integer,
	doc_physicianidnumber integer,
	bill_number integer,
	PRIMARY KEY(app_date, app_time),
	FOREIGN KEY(pat_idnumber) REFERENCES PATIENT(pat_idnumber),
	FOREIGN KEY(doc_physicianidnumber) REFERENCES DOCTOR(doc_physicianidnumber),
	FOREIGN KEY(bill_number) REFERENCES BILL(bill_number)
);

CREATE TABLE PAYMENT (
	pay_receiptnumber integer,
	pay_amount float(3),
	pay_date date,
	pay_method varchar(50),
	pat_idnumber integer,
	bill_number integer,
	PRIMARY KEY(pay_receiptnumber),
	FOREIGN KEY(pat_idnumber) REFERENCES PATIENT(pat_idnumber),
	FOREIGN KEY(bill_number) REFERENCES BILL(bill_number)
);

CREATE TABLE INSURANCECOMPANY (
	ins_name varchar(50),
	ins_benefitscontact varchar(50),
	ins_phonenumber integer,
	ins_clainmsaddress varchar(50),
	pat_idnumber integer,
	pay_receiptnumber integer,
	PRIMARY KEY(ins_name),
	FOREIGN KEY(pat_idnumber) REFERENCES PATIENT(pat_idnumber),
	FOREIGN KEY(pay_receiptnumber) REFERENCES PAYMENT(pay_receiptnumber)
);