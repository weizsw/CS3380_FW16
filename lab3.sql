CREATE TABLE classes(
	name varchar(50),
	department varchar(50),
	course_id varchar(50),
	start time(0),
	end time(0),
	days varchar(31),
	PRIMARY KEY(course_id)
);

INSERT INTO classes VALUES ('ENGLISH', 'EDUCATION', '1000', '13:00:00', '13:50:00', 'MWF');
INSERT INTO classes VALUES ('CHINESE', 'EDUCATION', '2210', '9:00:00', '9:50:00', 'MWF');
INSERT INTO classes VALUES ('JAPENESE', 'EDUCATION', '2310', '10:00:00', '11:15:00', 'TTh');
INSERT INTO classes VALUES ('ENGINEERING', 'ENGINEERING', '1100', '14:00:00', '14:50:00', 'MWF');
INSERT INTO classes VALUES ('ART_GENERAL', 'ART&SCIENCE', '1020', '15:30:00', '16:35:00', 'TTh');
INSERT INTO classes VALUES ('CS', 'ENGINEERING', '3380', '9:00:00', '9:50:00', 'MWF');
INSERT INTO classes VALUES ('PYCHOLOGY', 'ART&SCIENCE', '3000', '20:00:00', '20:50:00', 'MWF');
INSERT INTO classes VALUES ('NUTRITION', 'ART&SCIENCE', '1034', '12:00:00', '12:50:00', 'MWF');
INSERT INTO classes VALUES ('SOCIAL_SCIENCE', 'ART&SCIENCE', '3310', '9:00:00', '10:15:00', 'TTh');
INSERT INTO classes VALUES ('FINANCE', 'BUSINESE', '2000', '10:00:00', '10:50:00', 'MWF');

SELECT * FROM classes;
SELECT DISTINCT start FROM classes;
SELECT * FROM classes WHERE department='EDUCATION';
SELECT DISTINCT name, course_id FROM classes WHERE days='MWF';
SELECT TIMEDIFF(end, start) FROM classes;

UPDATE classes SET days='TTh' WHERE course_id='1000';
UPDATE classes SET start='2:00:00',end='2:50:00' WHERE days='MWF';
UPDATE classes SET department='NEW' WHERE department='EDUCATION';
UPDATE classes SET name='WOW', course_id='3721' WHERE name='ENGLISH';
DELETE FROM classes WHERE department='BUSINESE';