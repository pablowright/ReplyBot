Twitter Bot Written in php. 

    Search Twitter for words, users, hashtags, etc. and reply with whatever from a text file.
    Run from cron at an interval of your choosing. You might want to be careful not to run it
    too often or you risk annoying people.
    
    author Paul Wright. pablo.wright@gmail.com.
    
    version 1.02 04/26/2015 PRW


    In addition to the ReplyBot.php file you need a txt file. Example txt file is included.
    You also need the twitteroauth php library by Abraham Williams 
    (https://github.com/abraham/twitteroauth).
    If you are only using one Twitter account, you can put your credentials in ReplyBot.php 
    file directly. Else modify the 'user.php'  file with your twitter tokens. 
    You of course, need a Twitter app. There are tutorials EVERYWHERE on setting this up.
    
    05-28-2016: Nothing too fancy here; simple and tweets from text files.
    For a little more "on-target" Twitter replies, check out the Tweeter-Collector. It allows for a 
    little more granular replies if you tweet on multiple subjects or have multiple twitter accounts. 


