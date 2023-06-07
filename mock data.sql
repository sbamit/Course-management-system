
create table student( 
             std_ID varchar(10) not null,
             password varchar(20) not null,
             firstname varchar(50) not null,
             lastname varchar(50) not null,
             sex char(1) not null,
             dept varchar(10) not null,
             level int,
             term int,
             cgpa decimal(3,2),
             primary key (std_ID)
            );


create table teacher (
            teacher_ID varchar(10) not null,
            password varchar(20) not null,
            firstname varchar(50) not null,
            lastname varchar(50) not null,
            sex char(1) not null,
            dept varchar(10) not null,
            faculty varchar(10) not null,
            designation varchar(40) not null,
            primary key (teacher_ID)
           );



create table course(
             course_ID varchar(10) not null,
             course_name varchar(50) not null,
             course_credit decimal(3,2) not null,
             course_type char(1) not null,
             course_no varchar(20) not null,
             dept varchar(20) not null,
             level int not null,
             term int not null,
             primary key(course_ID),
            ); 	

create table student_course(
             student_ID varchar(10) not null,
             course_ID varchar(10) not null,
             primary key(student_ID,course_ID),
             foreign key (student_ID) references student (std_ID),
             foreign key (course_ID) references course(course_ID)
            );


create table teacher_course(
             teacher_ID varchar(50) not null,
             course_ID varchar(50) not null,
             primary key(teacher_ID, course_ID),
             foreign key (teacher_ID) references teacher(teacher_ID),
             foreign key (course_ID) references course(course_ID)
            );


create table file(
             file_ID int not null auto_increment,
             file_name varchar(50) not null,
             file_extension varchar(10) not null,
             file_info varchar(50) not null,
             upload_date date not null,
             file_link varchar(50) not null,
             teacher_ID varchar(10) not null,
             course_ID varchar(10) not null,
             author varchar(50) not null,
             hits int,
             primary key (file_ID),
             foreign key (teacher_ID) references teacher(teacher_ID),
             foreign key (course_ID)  references course(course_ID)
            );


create table assignment(
            as_ID int not null auto_increment,
            as_name varchar(50) not null,
            as_extension varchar(10) not null,
            as_info varchar(50) not null,
            as_upload_date date not null,
            as_link varchar(50) not null,
            student_ID varchar(10) not null,
            teacher_ID varchar(10) not null,
            course_ID varchar(10) not null,
            as_author varchar(50) not null,
            as_hits int,
            primary key (as_ID),
            foreign key (teacher_ID) references teacher(teacher_ID),
            foreign key (course_ID)  references course(course_ID),
            foreign key (student_ID) references student(std_ID)
    );	


		
create table marks_sheet_theory(
            student_ID varchar(10) not null,
            course_ID varchar (10) not null,
            CT1_marks decimal(3,2),
            CT2_marks decimal(3,2),
            CT3_marks decimal(3,2),
            CT4_marks decimal(3,2),
            CT5_marks decimal(3,2),
            CT6_marks decimal(3,2),
            CT7_marks decimal(3,2),
            CT8_marks decimal(3,2),
            CT9_marks decimal(3,2),
            PRIMARY KEY (student_ID, course_ID),
            foreign key (student_ID) references student (std_ID),
            foreign key (course_ID) references course(course_ID)
);

create table marks_sheet_sessional(
            student_ID varchar(10) not null,
            course_ID varchar (10) not null,
            AS1_marks decimal(3,2),
            AS2_marks decimal(3,2),
            AS3_marks decimal(3,2),
            AS4_marks decimal(3,2),
            AS5_marks decimal(3,2),
            AS6_marks decimal(3,2),
            AS7_marks decimal(3,2),
            AS8_marks decimal(3,2),
            AS9_marks decimal(3,2),
            AS10_marks decimal(3,2),

            AS11_marks decimal(3,2),
            AS12_marks decimal(3,2),
            AS13_marks decimal(3,2),
            AS14_marks decimal(3,2),
            AS15_marks decimal(3,2),
            AS16_marks decimal(3,2),
            AS17_marks decimal(3,2),
            AS18_marks decimal(3,2),
            AS19_marks decimal(3,2),
            AS20_marks decimal(3,2),

            PRIMARY KEY (student_ID, course_ID),
            foreign key (student_ID) references student (std_ID),
            foreign key (course_ID) references course(course_ID)
);			
			
			
			
/***********************************************/
There's no problem with database design
all relationships are handled properly :)

/***********************************************/
			
			


insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0805001','0805001','Ishat','Rabban','M','CSE',3,2,3.9);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0906021','0906021','Shad','Aziz','M','EEE',2,2,3.23);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0704081','0704081','Ahmed','Ali','M','MME',4,2,3.87);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0805101','0805101','Shaina','Amin','F','CSE',3,2,3.9);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0910031','0910031','Imran','Morshed','M','ME',2,2,3.67);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0805002','0805002','Radi','Reza','M','CSE',3,2,3.93);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('1006113','1006113','Isha','Rabbany','M','EEE',2,1,3.53);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0805021','0805021','Himel','Dev','M','CSE',3,2,3.86);

insert into student (std_ID,password,firstname,lastname,sex,dept,level,term,cgpa) 
values ('0702113','0702113','Shaila','Mustafa','F','CE',4,2,3.93);
q





insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation)
values ('cse001','cse001','Latiful','Hoque','M','CSE','EEE','Professor');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('cse002','cse002','Sukarna','Barua','M','CSE','EEE','Lecturer');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('ce0045','ce0045','Saidur','Morshed','M','CE','CE','Professor');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('eee023','eee023','Abdul','Qader','M','EEE','EEE','Lecturer');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('mme082','mme082','Samira','Basher','F','MME','ChE','Associate professor');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('ce0073','ce0073','Subol','Banik','M','CE','CE','Lecturer');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('eee124','eee124','Sharna','Barua','F','EEE','EEE','Assistant professor');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('cse003','cse003','Sayeed','Mondol','M','CSE','EEE','Associate professor');

insert into teacher (teacher_ID,password,firstname,lastname,sex,dept,faculty,designation) 
values ('me0167','me0167','Saraf','Ullah','M','ME','ME','Lecturer');







insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('CSE_301','Concrete math',3.00,'T','CSE 301','CSE',3,2);	

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('CE_401','Basic design principles',3.00,'T','CE 401','CE',4,2);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('EEE_215','Electromagnetics',4.00,'T','EEE 215','EEE',2,2);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('MME_402','Mechanical drawing',1.50,'S','MME 402','MME',4,2);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('IPE_304','Machine design',2.00,'S','IPE 304','IPE',3,1);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('EEE_206','Electrical machines',1.50,'S','EEE 206','EEE',2,1);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('ME_231','Thermodynamics',4.00,'T','ME 231','ME',2,2);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('CE_309','Fluid dynamics',3.00,'T','CE 309','CE',3,1);

insert into course (course_ID,course_name,course_credit,course_type,course_no,dept,level,term)
values('CSE_300','Compiler',0.75,'S','CSE 300','CSE',3,1);







insert into student_course (student_ID,course_ID)
values('0805001','CSE_301');

insert into student_course (student_ID,course_ID)
values('0906021','EEE_215');

insert into student_course (student_ID,course_ID)
values('0704081','MME_402');

insert into student_course (student_ID,course_ID)
values('0805101','CSE_301');

insert into student_course (student_ID,course_ID)
values('0910031','ME_231');

insert into student_course (student_ID,course_ID)
values('0805002','CSE_301');

insert into student_course (student_ID,course_ID)
values('1006113','EEE_206');

insert into student_course (student_ID,course_ID)
values('0805021','CSE_301');

insert into student_course (student_ID,course_ID)
values('0702113','CE_401');







insert into teacher_course (teacher_ID,course_ID)
values('cse001','CSE_301');

insert into teacher_course (teacher_ID,course_ID)
values('cse002','CSE_300');

insert into teacher_course (teacher_ID,course_ID)
values('ce0045','CE_401');

insert into teacher_course (teacher_ID,course_ID)
values('eee023','EEE_206');

insert into teacher_course (teacher_ID,course_ID)
values('mme082','MME_402');

insert into teacher_course (teacher_ID,course_ID)
values('ce0073','CE_309');

insert into teacher_course (teacher_ID,course_ID)
values('eee124','EEE_215');

insert into teacher_course (teacher_ID,course_ID)
values('cse003','CSE_301');

insert into teacher_course (teacher_ID,course_ID)
values('cse002','CSE_301');






insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000001','DB soln','Problem set sln','2012-06-01','CSE 301','cse001','CSE_301'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000002','Java demo','Problem demo','2012-06-08','CSE 300','000002','CSE 300'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000015','Design demo','Problem set designs','2012-04-15','CE 401','000045','CE 401'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000020','Machine related prblms','Problem set sln','2012-05-23','EEE 206','000023','EEE 206'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000018','Design book pdf','Design related prblms','2012-05-11','MME 402','000082','MME 402'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000007','Fluid dynamics pdf','Pdf book','2012-06-07','CE 309','000073','CE 309'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000004','Electromagnetism pdf','Pdf book','2012-06-01','EEE 300','000124','EEE 215'); 

insert into file (file_ID,file_name,file_info,upload_date,file_link,teacher_ID,course_ID)
values ('000013','DB book pdf','Pdf book','2012-04-11','CSE 301','cse003','CSE_301'); 




