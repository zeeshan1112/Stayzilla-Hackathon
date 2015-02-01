

# Stayzilla-Hackathon
# Description
Data Analysis (PHP Codes).
Given Data
hackathon_location_data.csv
hackathon_chat_data.csv
chat_location_mapping.csv

1. We compressed 65,000 chat entries given in hackathon_chat_data.csv to 10,000 entries without the loss of any important information.

  The data achieved can  be found in the file chat_id.csv.

2. We also compressed data given in chat_location_mapping.csv as much as possible to reduce duplicate entries of a particular city.

3. From these two reduced set of information we calculated some useful user-behaviour as follows.
4. 
  i. We divided the entire day into 7 time zones. We calculated average duration of a chat session for each timezone. We also calculated average frequency of messages and average length of stay for each time zone.

    The files are timestamp-rel.csv, the detailed data can be found in timestamp-details.csv. 
    
    The zones are defined as follows
    
    a. Early Morning  6a.m to 9a.m
    
    b. Morning 9a.m to 12p.m
    
    c. Afternoon 12p.m to 3 p.m
    
    d. Evening 3p.m to 6p.m
    
    e. Late Evening 6p.m to 9p.m
    
    f. Night 9p.m to 12a.m
    
    g. Past Midnight 12a.m to 6a.m
    
  ii. We calculated average number of messages in context of each city in the database. The data can be found in msgpercity.csv.
  
  iii. We calculated average length of stay in context of eah city in the database. The data can be found in avgstays.csv.

#Technology Stack

1. We used PHP as a programming language.

2. We used csv for storing data.

3. Platforms : Ubuntu, Windows.

4. Visual Representation : SAP Lumira

#Conclusion

In these 24 hours we were able to structure and compress a humongous unorganized set of data. We visualized the generated data to show trends and relations between different parameters of the data.
![:-(](https://github.com/zeeshan1112/Stayzilla-Hackathon/blob/master/visual%20slides/durperzone.png "durperzone")
![:-(](https://github.com/zeeshan1112/Stayzilla-Hackathon/blob/master/visual%20slides/freqperzone.png "freqperzone")
![:-(](https://github.com/zeeshan1112/Stayzilla-Hackathon/blob/master/visual%20slides/msgpercity.png "msgpercity")
![:-(](https://github.com/zeeshan1112/Stayzilla-Hackathon/blob/master/visual%20slides/staypercity.png "staypercity")
![:-(](https://github.com/zeeshan1112/Stayzilla-Hackathon/blob/master/visual%20slides/stayperzone.png "stayperzone")
