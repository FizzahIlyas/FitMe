DROP SEQUENCE memberID;
DROP SEQUENCE planID;
DROP SEQUENCE workoutID;
DROP TABLE workout_exercise;
DROP TABLE Exercise;
DROP TABLE fitnessLog;
DROP TABLE Diet;
DROP TABLE Workout;
DROP TABLE planRoutine;
DROP TABLE Member;
DROP TABLE Trainer;
DROP TABLE Person;



CREATE SEQUENCE memberID
START WITH 2
INCREMENT BY 1
MAXVALUE 100000;

CREATE SEQUENCE planID
START WITH 2
INCREMENT BY 1
MAXVALUE 100000;

CREATE SEQUENCE workoutID
START WITH 2
INCREMENT BY 1
MAXVALUE 100000;


CREATE TABLE Person(
                    CNIC NUMBER(13) NOT NULL,
                    startDate DATE,
                    firstName VARCHAR2(15),
					middleName VARCHAR2(15),
                    lastName VARCHAR2(15),
                    CONSTRAINT pk_person PRIMARY KEY(CNIC)
                   );


CREATE TABLE Trainer(
                    CNIC NUMBER(13),
                    qualification VARCHAR2(15),
                    yearsOfExperience NUMBER(2),
                    CONSTRAINT fk_ptrainer FOREIGN KEY(CNIC)
                    REFERENCES Person(CNIC)
                   );



CREATE TABLE Member(
                    memberID NUMBER(6) NOT NULL,
                    CNIC NUMBER(13),
                    feesPayable NUMBER(6),
                    remainingSub NUMBER(6),
					CONSTRAINT pk_member PRIMARY KEY(memberID),
                    CONSTRAINT fk_pmember FOREIGN KEY(CNIC)
                    REFERENCES Person(CNIC)
                   );

CREATE TABLE planRoutine(
                    	planID NUMBER(6) NOT NULL,
                    	dateStarted DATE,
                    	noOfDays NUMBER(7),
						CNIC NUMBER(13),
                    	CONSTRAINT pk_planroutine PRIMARY KEY(planID),
						CONSTRAINT fk_planperson FOREIGN KEY(CNIC)
                    	REFERENCES Person(CNIC)
                   );


CREATE TABLE Workout(
                    	workoutID NUMBER(6) NOT NULL,
						planID NUMBER(6),
                    	duration NUMBER(8),
                    	exerciseLevel NUMBER(2),
                    	CONSTRAINT pk_workout PRIMARY KEY(workoutID),
						CONSTRAINT fk_workoutplan FOREIGN KEY(planID)
                    	REFERENCES planRoutine(planID)
                   );


CREATE TABLE Diet(
						planID NUMBER(6),
                        name VARCHAR2(15),
                        specification VARCHAR2(50),
						totalCalories NUMBER(5),
						CONSTRAINT fk_dietplan FOREIGN KEY(planID)
                        REFERENCES planRoutine(planID)
                   );


CREATE TABLE fitnessLog(
                        memberID NUMBER(6),
						height VARCHAR2(6),
                        weight VARCHAR2(6),
						caloricIntake NUMBER(5),
						CONSTRAINT fk_logmember FOREIGN KEY(memberID)
                        REFERENCES Member(memberID)
                   );

CREATE TABLE Exercise(
                        name VARCHAR2(15) NOT NULL,
                        reps NUMBER(3),
						noOfSets NUMBER(3),
						muscleGroup VARCHAR2(15),
						equipment VARCHAR2(25),
						CONSTRAINT pk_exercise PRIMARY KEY(name)
                   );
				   
CREATE TABLE workout_exercise(
						workoutID NUMBER(6),
						name VARCHAR2(15),
						CONSTRAINT fk_workout FOREIGN KEY(workoutID)
                		REFERENCES Workout(workoutID),
						CONSTRAINT fk_name FOREIGN KEY(name)
                    	REFERENCES Exercise(name)
                    );

CREATE OR REPLACE TRIGGER person_member
BEFORE DELETE OR UPDATE ON Member
FOR EACH ROW
ENABLE
DECLARE
             v_user          VARCHAR2(10);
BEGIN
             SELECT user
             INTO v_user
             FROM dual;
             IF UPDATING THEN
                DBMS_OUTPUT.PUT_LINE('Member updated, '|| v_user);
             ELSIF DELETING THEN
                DBMS_OUTPUT.PUT_LINE('Member deleted, '|| v_user);
             END IF;
END;
/

CREATE OR REPLACE TRIGGER member_log
BEFORE DELETE OR UPDATE ON fitnessLog
FOR EACH ROW
ENABLE
DECLARE
             v_user          VARCHAR2(10);
BEGIN
             SELECT user
             INTO v_user
             FROM dual;
             IF DELETING THEN
                DBMS_OUTPUT.PUT_LINE('Log deleted, '|| v_user);
             ELSIF UPDATING THEN
                DBMS_OUTPUT.PUT_LINE('Log updated, '|| v_user);
             END IF;
END;
/

/**/

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740523199365, '09-JAN-21', 'Mashaf', ' ', 'Zaman');


INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740512345678, '26-MAY-21', 'Ali', ' ', 'Akram');

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740512372634, '05-MAY-21', 'Azwar', ' ', 'Shariq');

/*
INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740598765432, '14-FEB-21', 'Bilaluddin', ' ', 'Ahmad');

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740578394263, '11-JAN-21', 'Nile', ' ', 'Lazarus');

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740511293746, '13-OCT-21', 'Nisar', ' ', 'Mahmood');


INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740523626383, '23-APR-21', 'Mateen', ' ', 'Ahmed');

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740510283939, '14-JAN-21', 'Abdul', ' ', 'Ahad');

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740500921123, '03-APR-21', 'Rimsha', ' ', 'Iftikhar');

INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName)
VALUES (3740581675160, '25-MAR-21', 'Fizzah', ' ', 'Ilyas');
*/


INSERT INTO Trainer(CNIC, qualification, yearsOfExperience)
VALUES (3740512372634, 'Health Expert', 5);

INSERT INTO Trainer(CNIC, qualification, yearsOfExperience)
VALUES (3740512345678, 'Health Expert', 2);

/*
INSERT INTO Trainer(CNIC, qualification, yearsOfExperience)
VALUES (3740598765432, 'Health Expert', 1);

INSERT INTO Trainer(CNIC, qualification, yearsOfExperience)
VALUES (3740578394263, 'Health Expert', 4);

INSERT INTO Trainer(CNIC, qualification, yearsOfExperience)
VALUES (3740511293746, 'Health Expert', 5);
*/


INSERT INTO Member(memberID, CNIC, feesPayable, remainingSub)
VALUES (1, 3740523199365, 4500, 0);
/*
INSERT INTO Member(memberID, CNIC, feesPayable, remainingSub)
VALUES (2, 3740523626383, 7000, 1);

INSERT INTO Member(memberID, CNIC, feesPayable, remainingSub)
VALUES (3, 3740510283939, 2000, 0);

INSERT INTO Member(memberID, CNIC, feesPayable, remainingSub)
VALUES (4, 3740500921123, 6500, 2);

INSERT INTO Member(memberID, CNIC, feesPayable, remainingSub)
VALUES (5, 3740581675160, 4000, 0);
*/


INSERT INTO planRoutine(planID, dateStarted, noOfDays, CNIC)
VALUES (1, '09-DEC-20', 45, 3740523199365);
/*
INSERT INTO planRoutine(planID, dateStarted, noOfDays, CNIC)
VALUES (2, '06-MAY-21', 30, 3740510283939);

INSERT INTO planRoutine(planID, dateStarted, noOfDays, CNIC)
VALUES (3, '25-FEB-21', 25, 3740500921123);

INSERT INTO planRoutine(planID, dateStarted, noOfDays, CNIC)
VALUES (4, '15-MAR-21', 30, 3740512372634);

INSERT INTO planRoutine(planID, dateStarted, noOfDays, CNIC)
VALUES (5, '22-SEP-21', 31, 3740523626383);
*/


INSERT INTO Workout(workoutID, planID, duration, exerciseLevel)
VALUES (1, 1, 60, 3);
/*
INSERT INTO Workout(workoutID, planID, duration, exerciseLevel)
VALUES (2, 3, 45, 1);

INSERT INTO Workout(workoutID, planID, duration, exerciseLevel)
VALUES (3, 5, 30, 1);

INSERT INTO Workout(workoutID, planID, duration, exerciseLevel)
VALUES (4, 2, 90, 5);

INSERT INTO Workout(workoutID, planID, duration, exerciseLevel)
VALUES (5, 4, 50, 2);
*/


INSERT INTO Diet(planID, name, specification, totalCalories)
VALUES (1, 'CI-CO', 'Calories in, calories out', 2500);
/*
INSERT INTO Diet(planID, name, specification, totalCalories)
VALUES (2, 'Atkins diet', 'A low-carbohydrate diet', 1500);

INSERT INTO Diet(planID, name, specification, totalCalories)
VALUES (3, 'Ketogenic diet', 'Low-carb, high-fat diet', 2000);

INSERT INTO Diet(planID, name, specification, totalCalories)
VALUES (4, 'Dukan diet', 'Multi-step diet based on high protein', 2500);

INSERT INTO Diet(planID, name, specification, totalCalories)
VALUES (5, 'Zone diet', 'Aims for nutritional balance', 1800);
*/


INSERT INTO Exercise(name, reps, noOfSets, muscleGroup, equipment)
VALUES ('Curls', 15, 3, 'Biceps', 'curl bar');

INSERT INTO Exercise(name, reps, noOfSets, muscleGroup, equipment)
VALUES ('Chest press', 15, 3, 'Pecs', 'chest press machine');

INSERT INTO Exercise(name, reps, noOfSets, muscleGroup, equipment)
VALUES ('Lat pull-down', 15, 3, 'Lat', 'lat pull-down machine');

INSERT INTO Exercise(name, reps, noOfSets, muscleGroup, equipment)
VALUES ('Leg press', 15, 3, 'Quadriceps', 'leg press machine');

INSERT INTO Exercise(name, reps, noOfSets, muscleGroup, equipment)
VALUES ('Leg extension', 15, 3, 'Hamstrings', 'leg extension machine');



INSERT INTO workout_exercise(workoutID, name)
VALUES (1, 'Curls');
/*
INSERT INTO workout_exercise(workoutID, name)
VALUES (3, 'Leg press');

INSERT INTO workout_exercise(workoutID, name)
VALUES (4, 'Chest press');

INSERT INTO workout_exercise(workoutID, name)
VALUES (5, 'Lat pull-down');

INSERT INTO workout_exercise(workoutID, name)
VALUES (2, 'Leg extension');
*/