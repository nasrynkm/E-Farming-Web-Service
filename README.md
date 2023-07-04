UNIVERSITY OF DAR ES SALAAM   
   
COLLEGE OF INFORMATION AND COMMUNICATION TECHNOLOGIES  
(CoICT)  
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING   
  	   	   	   FINAL YEAR PROJECT REPORT 2020/2021   
PROJECT TITLE: E-FARMING WEB SERVICE 
   
      NAME OF CANDIDATE: 1. 
                                                      2. 
                                                      3. 
                                                      4. 
 	OSAMA H. SACHU (2021-02-00752) 
 
AMIRI S. MTUNDUU (2021-02-00601) 
 
BRENDA CRISPIN (2021-02-00607) 
 
NASRY K. MANSOUR (2021-02-00747) 
 
Academic supervisor’s Name:    	MR. HENRICK MWASITA 
 
Programme Name:   	Diploma in Computer Science   
 
 


 
DECLARATION 
 
We, SACHU, OSAMA H ,  MTUNDUU, AMIRI S , CRISPIN, BRENDA B and 
MASNOUR, NASRY K with registration numbers 2021-02-00752, 2021-02-00601, 2021-02-
00607 and 2021-02-00747. We declare that this report entitled “E-FARMING WEB SERVICE” is our work and has not been copied from other institution or someone else works. 
 
REGISTRATION NO. 	SIGNATURE 	DATE 
1. 2021-02-00752 	 	 
2. 2021-02-00601 	 	 
3. 2021-02-00607 	 	 
4. 2021-02-00747 	 	 
 
 
Supervisor name: MR. HENRICK MWASITA 
Supervisor’s Signature                                                                            Date 
……………………….                                                                           ………………………. 
 
 
 
 

 
ABSTRACT 
 
The E-Farming Web Service project aims to develop a web-based platform that facilitates communication between farmers and customers, allowing easy access to market information and stock location of agricultural produce. The main objective of this project is to provide a userfriendly and accessible platform that streamlines the process of buying and selling agricultural products. The specific objectives are to establish the requirements for a proposed web-based efarming system, to design a system based on the identified requirements, and to implement the proposed web-based system. 
To achieve these objectives, the project was implemented using the Agile Software Development Methodology. This approach allowed for iterative development and continuous feedback, enabling the team to quickly adapt to changing requirements and user needs. The project involved conducting a needs assessment to identify the key features and functionalities required in the e-farming web service. Based on these requirements, a system design was developed, taking into account usability, security, and scalability considerations. The proposed web-based system was implemented and tested, with feedback from users used to make refinements as necessary. 
This project has the potential to significantly impact the agricultural sector by increasing the efficiency and transparency of the supply chain, and supporting the growth of local and sustainable food systems. By providing a platform for farmers to connect with customers and sell their products online, the project seeks to create new opportunities for small-scale farmers and promote the availability of fresh, locally-sourced produce. 
 
 
 
 

 
 
ACKNOWLEDGEMENTS 
 
We would like to express our gratitude to our manager, Mr. Henrick Mwasita, for guiding us through the development of the E-farming Web Service Project from the stage of ideation. We would especially want to thank Dr. Ruthbetha Kateule, Mr. Marco Masembo and Mr. Michael Kishiwa, our subject lecturers who taught us project management skills. As our research has come to an end, we would like to express our gratitude to the farmers and clients from Kibiti, Shinyanga, and Dar es Salaam in general for their assistance in gathering specifications and specific data regarding the agricultural industry in Tanzania. Finally, we would want to express our gratitude to ourselves for our mutual cooperation. 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

TABLE OF CONTENTS 
DECLARATION	ii
ABSTRACT	iii
ACKNOWLEDGEMENTS	iv
TABLE OF CONTENTS	v
LIST OF ABBREVIATIONS	vii
LIST OF FIGURES	viii
LIST OF TABLES	ix
CHAPTER 1: INTRODUCTION	1
1.1 General Introduction	1
1.2 Statement of the Problem	3
1.3 Project Objectives	3
1.3.1 Main Objective	3
1.3.2 Specific Objectives	3
1.4 Significance of the Project	3
1.5 Stakeholder Descriptions	4
1.6 Organization of the Project Report	4
CHAPTER 2: LITERATURE REVIEW	5
CHAPTER 3: METHODOLOGY	7
3.1 Requirement gathering	8
3.2 System design	8
3.3 Implementation	9
3.4 Testing	9
CHAPTER 4: REQUIREMENT ANALYSIS	10
4.1 Functional Requirements	10
4.2 Non-Functional Requirements	11
CHAPTER 5: SYSTEM DESIGN	12
5.1 Use case Description	12
5.2 Use case diagram	13
5.3 Data Flow Diagram	14
5.4 Entity Relationship Diagram	15
CHAPTER 6: SYSTEM IMPLEMENTATION	16
6.1 Landing Page	16
6.2 Login Page	18
6.3 Register page	19
6.4 Farmer Dashboard	20
6.6 Estimated Time for harvesting	21
6.7 View Ads section	21
CONCLUSION	24
REFERENCES	25
APPENDICES	26
I. Work breakdown structure	26
ii. Tasks and budget allocation	27
iii. The Gannt chart	28
iv. Questionnaires	29
With farmers:	29
With customers:	32
v. Requirements by stakeholders	34

 
 
 
 
 
 
 
 
 
 

LIST OF ABBREVIATIONS  
 
ADS: Advertisements 
PCs: Personal Computers 
ERD: Entity Relationship Diagrams 
DFD: Data Flow Diagrams 
IDE: Integrated Development Environment 
HTML: Hypertext Mark-up Language 
CSS: Cascading Style Sheets 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

LIST OF FIGURES 

Figure 3.1: Phases of Agile Model (InterviewBit)	7
Figure 5.2: Use case Diagram	13
Figure 5.3: Data flow diagram context level 1	14
Figure 5.4: Entity Relationship Diagram	15
Figure 6.1: Home page	17
Figure 6.2: Login form	18
Figure 6.3: Registration form	19
Figure 6.4: Farmer Dashboard	20
Figure 6.5: Adds Agricultural produce section	20
Figure 6.6: Estimated time	21
Figure 6.7: View adds section	21
Figure 6.8: Market chart	22
Figure 6.9: Customer dashboard	22
Figure 6.10: Farmer Dashboard	23
Figure 6.11: Work Breakdown Structure	26
Figure 6.12: The Gannt Chart	28
Figure 6.13: Farmer’s Questionnaire Analysis	31
Figure 6.14: Customer’s Questionnaire Analysis	33















LIST OF TABLES 

Table 4.1: Functional Requirements ............................................................................................. 10 
Table 4.2: Non-Functional Requirements ..................................................................................... 11 
Table 5.1: Use case Description.................................................................................................... 12 
Table 6.1: Tasks and budget allocation ......................................................................................... 26 
 
CHAPTER 1: INTRODUCTION 
1.1 General Introduction 
 
In our day-to-day life we consume food and our survival is predicated on mainly food. A considerable amount of our food is coming from farms and other means too. These farmers do their hard work for growing and serving many lives across the country, which pays for their source of income. But still the primary producers who are the farmers do not benefit from it. 
“Agricultural experts have to find a solution to the challenge of agricultural produce markets instead of emphasizing the increase in production alone’’ Hon. Hussein Bashe, The Minister of Agriculture in Tanzania (16th July 2018).  
Agriculture is the backbone of our Economy accounting for more than one a quarter of gross domestic product (GDP), Providing 85% of exports and employs about 80% of workforce (Anadolu Agency, 2020). 
Lack of access of market information: is one of the key challenges often seen by market system’s development practitioners. Customers lack information on the product and services available as well as their prices, while farmers lack information about demand for their product. 
In some cases, famers tend to transport agricultural produce to an area with low demand of agricultural produce and forces them to sell for low price hence they may incur a loss. On customer side, customers tend to travel long distance looking for areas with high supply of agricultural produce so they can make purchase but instead they end up finding areas with low supply at that time making them incur losses in cost they used to survey for agricultural produce. 
Long chain of middlemen: agricultural produce, perhaps, have the longest chain of middlemen. There are a number of intermediaries in the market like the wholesalers, brokers, commission agents, retailers and so on. The agricultural produce passes through all these people before they reach the ultimate consumer. As it passes through each individual, the price increases. So, it is only the consumer who is finally made to bear the burden. Thus, the high price paid by the consumer does not reach the primary producer (farmer). It’s beneficial only by the market intermediates. 
“We have to confront this reality that grassroots farmers are still living in poverty” says Hon. Yohana Balele, Shinyanga regional commissioner. He said that while the crop (cotton) has made a significant contribution to the economy since independence. Poverty levels among cotton farmers are still at 42%” IPPmedia (2018). 
 Around the villages in Tanzania’s western cotton growing area, where 99% of the country’s cotton is grown, the term agent (the middle men) has become a byword for cheating. Cheating comes in various forms at the weighing scales, half payments, delays in payments and price manipulations by the middlemen. 













 
1.2 Statement of the Problem 
 
Farmers and customers face a challenge in accessing information regarding the availability and demands of the agricultural produce due to lack of proper communication channel between farmers and customers. As a result, farmers end up selling their agricultural produce to middlemen in the markets who intends to make profits by purchasing the agricultural produce at low prices and selling them at higher prices to the final consumers. Customers spend time and costs to look after specific areas where they can get stock of agricultural produce that meet their demands, but sometimes they do not meet their demands. 
 
1.3 Project Objectives 
1.3.1 Main Objective 
 
The main objective of this project is to develop a web-based e-farming web service, that facilitates communication between a farmer and customer for easy access of both market information and stock location of the agricultural produce. 
1.3.2 Specific Objectives 
 
i.	To establish the requirements for a proposed web-based e-farming system  
ii.	To designing a system based on the identified requirements. 
iii.	To implement a proposed web-based. 
 
1.4 Significance of the Project 
 
An e-farming web service system will help farmers in remote areas to easily access information about markets that were previously out of reach, but also farmers will be able to inform directly their customers on the available agricultural produce. Customers will have a wide range of stock of agricultural produce to explore from farmers based on their needs and hence minimizing costs and time taken to look for stock in different areas. Both farmers and customers will enlarge the scope of their trade through trading with different counter parties. 
1.5 Stakeholder Descriptions 
 
The following are the stakeholders that are involved in our e-farming web service: - 
i.	The system development experts: These are the experts who are responsible to take part in all activities involved in system development life cycle including identify and assessing user needs or project requirements, designing, developing and testing the whole system. 
ii.	The system owner: Is responsible to create the project vision, sets objectives of the project and also a project owner will assist the project manager in improving leadership and managing the team's performance upon the project activities. 
iii.	The system users: These are individuals who utilize the system. 
 
1.6 Organization of the Project Report 
 
This report has been categorized into six chapters as follows: 
Chapter one covers the general introduction which has covered motivation and background of the project, statement of the problem, project objectives that included main and specific objectives, the significance of the project, stakeholder descriptions and organization of the project. Chapter two has covered the literature review of the project. Chapter three has covered the agile methodology with several phases including requirement gathering, designing, development and testing. Chapter four has covered requirement analysis which includes functional and non-functional requirements raised by stakeholders. Chapter five has covered the system design which included use case descriptions, use case diagram, data flow diagram and entity relationship diagram. And Chapter six has covered the system implementation which involved the use of development tools such as HTML, CSS, JS, PHP, MySQL, XAMPP and Visual Studio Code. Then conclusion, references and appendences.  
 
 
 

CHAPTER 2: LITERATURE REVIEW 
 
Agriculture is undoubtedly the largest and most important sector of the Tanzanian economy, with the country benefitting from a diverse production base that includes livestock, staple foods crops and variety of cash crops. And farmers being the primary producers in the Agricultural Industry. 
In 2011 agriculture contributed 26% to the country’s GDP. However, the sector provides 85% of the country’s export earnings, employs 75% of the country’s work force, and generates 95% of the food consumed in Tanzania (URT, 2013: - FAO, 2013). 
In agriculture, famers are titled as the primary producers in this industry. After harvesting, farmers take their products to the Chama cha Ushirika cha Msingi which collects the agricultural produce from farmers. Farmers are given a form (CPR) to fill in personal information such as Full name, Phone number and Bank Details. All collected agricultural produce are taken to be sold to the Tanzania Mercantile Exchange (TMX) then famers will be paid through their bank details after selling (Cashewnuts Board of Tanzania, 2020/2021).  
Dealers (the customers) set a budget for research of agricultural produce that meets their need, research agents are sent to look for places with plenty of agricultural produce in need. Buying of crops depends on the type of a dealer, Individual dealers go with an intention to buy the harvested crops directly from farmers while Industrial dealers plan to buy a certain amount after they get all information of availability of a certain agricultural produce, information about the stock availability is provided by the research agents from their industry.  
In Tanzania Mercantile Exchange (TMX), Farmers face challenges when selling their produce to TMX these include delay of their payments and selling their products in time, but also customers sometimes delay to accomplish their contracts in time since they have to wait for TMX to either conduct auction or collect enough stock for them to buy. Dealers (the Customers) face challenges when researching for what they basically need, since climate changes can impact yields of different agricultural produce in different places hence some places may have less yields in relation to demand of the agricultural produce in need. This may result into spending a lot of time and money in finding places with enough stock or yields. According to World Bank study on climate volatility in Tanzania, (Ahmed, 2009) found that maize had a 12% yield loss per degree Celsius, rice showed a 17% yield loss, and sorghum a 7% yield loss over a six-month growing season (Evans School Policy Analysis and Research, 2021). 
Having a system where a farmer can provide information of harvested yields or stock of the agricultural produce based on his or her location will help customers to easily access areas with high yields of the agricultural produce in need and hence reducing research costs such as time and money. But also, farmers will benefit on widening their market scope since customers from different locations will be able to spot them based on their needs, but also this will impact to fast payments after a peer-to-peer business between the farmer and the customer will be done. 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 




 
 
CHAPTER 3: METHODOLOGY 
 
This project has been implemented using the Agile Software Development Methodology, because Agile Methodology favors a flexible and short timeline for the project, but also changes can be amended to the system when new requirements are introduced and favors a few product requirements and regulatory requirements for small projects. 
Agile model consists of six different phases including Requirement gathering, Designing, 
Development, Testing, Deployment and Review (InterviewBit, 22 August 2022), 
 
 
 
 
 
Figure 3.1: Phases of Agile Model (InterviewBit)
 

3.1 Requirement gathering 
The requirements were collected by using methods such as interview and questionnaire. The requirements were collected from Kibiti, Dar es Salaam and Shinyanga in which included farmers and customers as the primary stakeholders. A total number of 120 Farmers and 120 Customers were interviewed. 
Questionnaire was the main method used to collect requirements. It helped to do a face-to-face interview with our stakeholders. Specifically, a Close Ended Questionnaire, a type of questionnaire in which stakeholders are asked direct questions and choose answers from a distinct set of pre-defined responses, such as “Yes or No” or among set of multiple-choice questions. We found it less time consuming since a type of stakeholders we had could not afford much time for a long conversation, so a Close Ended Questionnaire helped us to ease the interview in time and we came up with immediate results as per stakeholder.  
As per conducted interview questionnaire, many stakeholders showed that there is a need of having an E-Farming Web Service system that will solve their challenges to an extent of minimizing costs and risks while maximizing their profits through advancing into a digital EFarming Web Service System. 
A list of questions and interview that was conducted in the requirement gathering are included in APPENDICES section. 
 
3.2 System design 
After gathering the requirements, the system was designed and DFD was used to structure the way information flows through the system by considering the actual data inputs, outputs and the data store. And ERD was used to describe the conceptual design of the databases, this will help to preview the structure of the database. 
 
 
3.3 Implementation 
The implementation phase involved coding based on the system design. And the system contains frontend and backend. The frontend was implemented by using different languages, including HTML a markup language that will help to structure a website and its contents, CSS a language that will be used to style and layout web pages, JavaScript a scripting language that were used to build dynamic web pages that facilitates interactive websites. And the Backend was implemented by using SQL a standard language that was used for storing, manipulating and retrieving data from the databases and PHP a server scripting language and a powerful tool that is used for making dynamic and interactive web pages.  
For both frontend and backend, Visual Studio Code was used as an IDE which is good for writing different languages with lots of features like extensions for example live servers, language formatter, close tag. And MySQL Workbench which provides data modeling, SQL development and administration tools for server configuration and user administration. 
 
3.4 Testing 
After implementing the system, the system was checked whether the functionalities were working well. In order to test the system functionality one person was invited to act as farmer and another one to act as customer and then they registered into a system for the purpose of looking at system functionality int terms of posting products, updating, viewing and editing.  
 
 
 
 




 
CHAPTER 4: REQUIREMENT ANALYSIS 
 
4.1 Functional Requirements 
Functional requirements outline what the system must output and how it must react to various inputs. The functional specifications for the system are shown in the table below. 
Table 4.1: Functional Requirements 
ID 	FEATURE 	DESCRIPTION 	FARMER 	CUSTOMER 
A01 	Account Registration 	Both users should be able to create an account in the system. 	✓ 	✓ 
A02 	Log 	in 
Authentication 	Authorization should be only to log in activity that matches the password of a specific account. 	✓ 	✓ 
A03 	Posting 	of 
Agricultural produce 	Farmer should be able to post agricultural produce based on the available quantity. 	✓ 	✗ 
 
A04 	Update 	and 	delete 
ADDS of the agricultural produce. 	Farmer should be able to update agricultural produce available also to delete agricultural produce that is out of stock. 	✓ 	✗ 
A05 	Estimated time 	Farmer Should be able to set a time for agricultural produced that will be harvested 	✓ 	✗ 
A06 	Searching of items 	Both users should be able to browse items based on their categories through searching. 	✓ 	✓ 
A07 	Logging Out 	User should be able to sign out anytime. 	✓ 	✓ 
4.2 Non-Functional Requirements 
 
Non-functional requirements are those that are concerned with the system's operation and do not affect the functionality of the system, but they do affect how well it will function. The functional specifications for the system are shown in the table below. 
 
Table 4.2: Non-Functional Requirements 
 
ID 	FEATURE 	DESCRIPTION 
B01 	Availability 	The system should be available from both PCs and mobile devices via a web browser. 
B02 	Usability 	The user interface should be easy to use and make tasks completion simple for the user. 
B03 	Security 	The system should be secure and store all registered user’s data safely. 
 
 
 
 
 
 
 
 
 
 
 
 
 



 
CHAPTER 5: SYSTEM DESIGN 
 
5.1 Use case Description 
A use case description show how user interact with the system that involve the system itself and the actors 
Table 5.1: Use case Description 
 
ACTORS 	DESCRIPTION 	USE CASE 
 
 
Farmers 	 
 
Is an individual or group of people who produce agriculture product and then post into website for purpose of getting customers 
 	 
•	sign up 
•	login 
•	Post agricultural produce 
•	view agriculture produces details 
•	contact a farmer 
•	Update agricultural produce 
•	Delete Post 
•	Provide feedback 
 
 
Customers 	 
An individual or group of people who are looking for 
Agriculture products 	 
•	Sign up 
•	Login 
•	View agricultural produce details 
•	Contact a farmer 
•	Provide feedback 
 
 
System administrator 	 
He or she is responsible for managing all the activities involved in the system 	 
•	Login 
•	Receive feedback  
•	Managing user account 
•	Contact users 
 
5.2 Use case diagram 
A use case diagram has been used to visualize the different ways that users or external systems interact with a software system. The use case shown below describe the different ways that users how interact with the system to achieve specific goals or tasks.  
 
  
Figure 5.2: Use case Diagram
5.3 Data Flow Diagram 
 
A Data Flow Diagram (DFD) has been used to visual representation of the flow of data into the system.  
 
  
 

Figure 5.3: Data flow diagram context level 1
 
 
 
 
 
 
 
 
 

5.4 Entity Relationship Diagram 
 
An Entity-Relationship Diagram (ERD) is a graphical representation of the entities and the relationships between them within a system. An entity involved in the e-farming web service Are farmer, customer, product, system admin and farmer contact and each entity contain a set of attributes that describe it, as it shown below 
 
  
 

Figure 5.4: Entity Relationship Diagram

CHAPTER 6: SYSTEM IMPLEMENTATION 
The system was implemented through different languages on both frontend and backend. The frontend was implemented by using HTML, CSS, and JavaScript and Backend was implemented by using SQL, and PHP. 
For both frontend and backend, Visual Studio Code was used as an IDE which is good for writing different languages with lots of features like extensions for example live servers, language formatter, close tag.  
6.1 Landing Page 
In the landing page of E-farming web service system, both users (customers and farmers) have access to a user-friendly navigation menu on the home page. This menu allows them to easily navigate to specific sections, such as home, services, about us, contact and login, by ensuring a seamless browsing experience.   
  
 
Figure 6.1: Home page
6.2 Login Page 
The Login page of E-farming web service serves as a security entry point for both farmer and customer to access their respective accounts and engage in our platform services by providing their credentials (email and password) for ensuring the security and privacy of farmer and customer information. If user enter an invalid email, a friendly popup will guide him to correct credential information 
 
Figure 6.2: Login form
 
 
 
 
 
 
 
6.3 Register page 
The registration page facilitates the on boarding of farmers and customers onto the platform. Farmers interested in participating can create an account by providing their personal information, such as name, contact details, and location. Customers looking to access farm products can also register by submitting their necessary details, such as name, contact information, and location. 
 
 
 
Figure 6.3: Registration form
 
 
 
 
 
6.4 Farmer Dashboard 
On the part of farmer dashboard, a farmer can be able to delete post or updates price, start limit, Stock location, farmer products and estimated time for how long should take him/her to harvest agricultural produce. 
  
Figure 6.4: Farmer Dashboard
 
6.5 Updating Agricultural produce 
  
Figure 6.5: Adds Agricultural produce section
6.6 Estimated Time for harvesting 

  
Figure 6.6: Estimated time
6.7 View Ads section 
On view ads section a farmer can able to view agricultural produce post and also can able to view other farmers agricultural produce post and can contact a farmer. 
 
Figure 6.7: View adds section
6.8 Market Chart
In this section, users will be able to view market information. They will be able to see the maximum and minimum prices of specific products according to their location.
 
Figure 6.8: Market chart

6.9 Customer Dashboard 
  
Figure 6.9: Customer dashboard
6.10 View Farmers Agricultural produce 
Here a customer can view farmers Agricultural produce details posted by a farmer (price, start limit, ad stock location) and also can contact a farmer. 
 
Figure 6.10: Farmer Dashboard

















CONCLUSION 
 
Based on the objectives and findings of E-farming Web Service project, implementing a web based E-farming Service has the potential to revolutionize the agricultural industry in Tanzania. By facilitating direct communication between farmers and customers, this system can help to eliminate middlemen who often take advantage of information asymmetry to exploit both parties. This can lead to increased profits for farmers, who can sell their produce directly to customers, and lower costs for customers, who can access a wider range of produce at fair prices. 
 
In addition, this system can help to improve the efficiency of the agricultural supply chain by providing real-time information on the availability and location of the agricultural produce. Farmers can easily update their stock levels and share this information with customers, who can then plan their purchases accordingly. This can reduce wastage of time in finding for stock of agricultural produce and improve the overall productivity of the sector. 
 
Overall, the E-farming Web Service system proposed in this project has the potential to benefit all stakeholders in the agricultural industry, from farmers to customers to the economy as a whole. By embracing new technologies and innovative solutions, Tanzania can continue to build a vibrant and sustainable agricultural sector that meets the needs of its people and contributes to its continued growth and development. 
 
 
 
 
 
 
 
 
 
REFERENCES 
URT (2013); Tanzanian Agricultural Budget Report for the year 2012/2013, Dar-es-Salaam, Tanzania: Tanzania Government Printer. 
Repost of 2020, Cashewnuts Board of Tanzania; Mwongozo na .1 wa usimamizi wa masoko na mauzo ya korosho ghafi wa mwaka 2020/2021. Mtwara, Tanzania. 
EPAR (2021); Climate change and crops summaries. Available at: https://epar.evans.uw.edu/sites/default/files/Evans_UW_Request_118_Climate_Change_and_Cr ops_Executive_Summary_public.pdf 
Report of 2018, Wizara ya Kilimo Tanzania; Upatikanaji wa masoko ya mazao ya wakulima mwaka 2018. Available at: https://www.kilimo.go.tz/highlights/view/wataalamu-wa-kilimowametakiwa-kutafuta-suluhisho-la-changamoto-ya-masoko-y 
Report of 2020, Anadolu Agency; Unlocking potential of Tanzania’s smallholder farmers. Available at: https://www.aa.com.tr/en/africa/unlocking-potential-of-tanzanias-smallholderfarmers/1749472 
InterviewBit (2022); Agile Model. Available at: https://www.interviewbit.com/blog/agilemodel/#:~:text=about%20Agile%20Model.-
,What%20is%20the%20Agile%20Model%3F,and%20avoid%20long%2Dterm%20planning. 
IPPMEDIA (2018); The Farmer and the middlemen. Available at: 
https://www.ippmedia.com/en/news/farmer-and-middlemen 
 
 
 
 
 
 
 
APPENDICES 
I. Work breakdown structure 
 
The work breakdown structure has broken down the project into manageable pieces that were assigned to different individuals, tracked, and completed within a certain timeframe. 
 
 
 
 
 
Figure 6.11: Work Breakdown Structur
ii. Tasks and budget allocation 
Task and budget allocation has involved assigning a specific budget to each task in the project as follows; 
Table 6.1: Tasks and budget allocation 
	TASKS AND BUDGET ALLOCATION 		
Tasks No. 	Name of Task 	Participants 	Start Date 	End Date 	Days 	Cost/Task 
Task 1 	Project 
Definition 	All team members 	15-Nov-21 	26-Nov-21 	12 	TSh5,000.00 
Task 2 	Define goal 	All team members 	22-Nov-21 	03-Dec-21 	12 	TSh5,000.00 
Task 3 	Stakeholder description 	All team members 	22-Nov-21 	10-Dec-21 	19 	TSh12,000.00 
Task 4 	Literature review 	All team members 	06-Dec-21 	15-Dec-21 	10 	TSh12,600.00 
Task 5 	Work breakdown 	All team members 	10-Jan-22 	17-Jan-22 	8 	TSh14,500.00 
Task 6 	Time frame 	All team members 	10-Jan-22 	17-Jan-22 	8 	TSh10,000.00 
Task 7 	Budget allocation 	All team members 	10-Jan-22 	17-Jan-22 	8 	TSh10,000.00 
Task 9 	Requirements documentation 	All team members 	28-Feb-22 	11-Mar-22 	12 	TSh25,000.00 
Task 10 	Logical design 	Amir Mtunduu and Brenda Crispin 	12-Mar-22 	16-Mar-22 	5 	TSh32,900.00 
Task 11 	Physical design 	Amir Mtunduu and Brenda Crispin 	16-Mar-22 	20-Mar-22 	5 	TSh30,000.00 
Task 12 	Frontend development 	Amir Mtunduu, 
Brenda Crispin and Osama Sachu 	21-Mar-22 	20-May-22 	60 	TSh86,000.00 
Task 13 	Backend development 	Amir Mtunduu and Nasry Mansour 	01-Apr-22 	20-May-22 	51 	TSh100,000.00 
Task 14 	Linking Frontend and backend 	Amir Mtunduu and Nasry Mansour 	15-Apr-22 	20-May-22 	35 	TSh55,000.00 
Task 15 	Testing the system 	Brenda Crispin and Osama Sachu 	30-May22 	15-Jun-22 	17 	TSh25,000.00 
Task 16 	Project report 	All team members 	30-May22 	17-Jun-22 	19 	TSh32,000.00 
	TOTAL 	293 	TSh505,000.00 
iii. The Gannt chart 
 
The following is a Gantt chart that has been used to visualize the project schedule and showing a timeline of the project's tasks along with their start and end dates. 
  
Figure 6.12: The Gannt Chart
 
 
 
 
iv. Questionnaires  
 
The following was the questionnaire: - 
With farmers: 
i.	Have you ever used online platforms to trade your agricultural produce? 
A.	Yes – 10% 
B.	No – 90% 
 
ii.	How do you communicate with your customers? 
A.	Mobile Phones – 40% 
B.	Social Medias – 20% 
C.	Village Meetings – 30% 
D.	Peer-to-Peer – 10% 
 iii. Do you have a way to manage and communicate to all your customers based on the available agricultural produce at once? 
A.	Yes – 20% 
B.	No – 80% 
 
iv.	Can you trust an online e-farming web service system to handle your business details so that customers can easily navigate you on the available adds in the platform? 
A.	Yes – 90% 
B.	No – 10% 
 
v.	How do you make new customers? 
A.	In Local markers only – 20% 
B.	On social Medias only – 20% 
C.	Brokers – 10% 
D.	Both A and C – 50% 
 
vi.	What kind of farming are based in currently? 
A.	Food crops farming – 40% 
B.	Cash crops farming – 60% 
 
vii.	How do you deliver the products sold to your customers? 
A.	I Transport but with Cost included – 20% 
B.	No, I do not. – 40% 
C.	Customers take from my store – 40% 
 
viii.	Currently, are you free to set a price for your agricultural produce that favors your maximum possible profits? 
A.	Yes – 30% 
B.	No – 70% 
 ix. 	How do you widen or look for markets of your agricultural produce? 
A.	Travelling – 30% 
B.	Social Medias – 10% 
C.	Government auction – 30% 
D.	Use brokers – 30% 
 
x.	What is your preferred payment method for your sold agricultural produce? 
A.	Cash only – 20% 
B.	Bank only – 10% 
C.	Face to face – 20% 
D.	Both A and C – 30% 
E.	Both B and C – 20% 
 
xi.	According to the current trading system you have does it favor higher profits based on your production level and costs incurred? 
A.	Yes – 30% 
B.	No – 70% 
xii.	Do you believe an E-farming Web Service will help you cover several challenges, and hence being able to maximize your profits and increase management of your business? 
A.	Yes – 90% 
B.	No – 10% 
 
 
The following figure shows farmer’s questionnaire analysis as per question and the number of farmers who attempted it. 
 
   
Figure 6.13: Farmer’s Questionnaire Analysis
 
 
 
 

 
With customers: 
	i. 	Does it take a lot of time looking for agricultural produce that meet your demands? 
A.	Yes – 95% 
B.	No – 5% 
 ii. 	Have you ever traded agricultural produce on an online platform? 
A.	Yes – 10% 
B.	No – 90% 
 
iii.	Do you get information on the available products from the farmers in time? 
A.	Yes – 30% 
B.	No – 70% 
 
iv.	Do you think your current trading platform or system is the cause of less profits? 
A.	Yes – 60% 
B.	No – 40% 
 
v.	Does it cost a lot to look for stock of agricultural produce in demand? 
A.	Yes – 85% 
B.	No – 15% 
 vi. Will an E-farming Web service help you to navigate stocks, lower costs and maximize profits in this business? 
A.	Yes – 95% 
B.	No – 5% 
 
vii.	How do you meet new farmers as partners in the business? 
A.	On auctions – 20% 
B.	Local Markets – 30% 
C.	Social Medias – 10% 
D.	Travelling – 40% 
viii.	Do you believe that increase in the scope of information of availability of agricultural produce will ease, lower your costs and maximize profits? 
A.	Yes – 100% 
B.	No – 0% 
 ix. Can you trust E-Farming Web Service to handle your identity so that the Farmer can be free to trade with you as legal entity? 
A.	Yes – 95% 
B.	No – 5% 
 
 
The following figure shows customer’s questionnaire analysis as per question and the number of customers who attempted it. 
 
  

Figure 6.14: Customer’s Questionnaire Analysis
v. Requirements by stakeholders 
 
The following are the requirements that were raised by stakeholders during the interview: - 
i)	I should be able to register an account in the system that will help me to log in and stay on track. 
ii)	All accounts should be associated with passwords to restrict any authorized access. iii) 	As a farmer I should be able to post quantity of my available agricultural produce. iv) 	Both of us should be able to provide our valid contact details. 
v)	After my customer has agreed with buying my stock then I should be able to delete or reduce the quantity of a specified agricultural produce from my post. 
vi)	The system should be working and arranged well allowing all of us to easily navigate stuffs. 
vii)	Customers should be able to explore the available agricultural produce in different menu each with crop type. 
viii)	The system should allow q1us to log out after use. ix) 	The system should provide us with support for any inconvenience. 
x)	The system should be run daily and ease of access. 
xi)	One should be able to view it in all devices screens and well seen. xii) 	One should be able to report a certain person with reasons. 
xiii)	There should be a searching mechanism that will help to navigate thing easily within the system.  
xiv)	The system should load items faster.  
xv)	We should be able to provide feedback based on the functioning of the system. 
 

