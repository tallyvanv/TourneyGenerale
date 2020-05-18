# TourneyGenerale

## Assignment
Make an application to organise tournaments with at least 2 people (must scale to double digits). </br>
Once teams and users are created the application randomizes matchups and creates knock-out rounds when needed (odd number teams). </br>
After each round has been played the application generates new matchups, until a winner is crowned. </br>
Use Symfony to create the application. Make sure to make use of OOP and MVC </br>
A database should be used to store the team and user data.

The application should at least consist of these pages


### New Tournament Page
Admin:  </br>
Give user an option to select how many people will participate. </br>
Give the tournament a name and a startdate </br> 

User:  </br>
Can log in with a username of choice.

### Homepage
Shows the name and duration of the current tournament. Changes when tournament ends or new tournament is created. </br>
Include an easy accessible navigation menu to swap between pages

### Ranking Page
Show the current leaderboard. The best scoring team/user should appear at the top.
Include their score and teammembers, as well as functionality to search how another team is doing.

### Team Page
After a user sets his name he is able to access this page. Here he joins or creates a team. </br> 
these teams go in the draft once created. Once the admin starts the game no new teams can be created. </br>
OPTIONAL: specify how large teams can be and lock them after the maximum capacity has been reached.

### Matchup Page
*Start with round robin*
On this page users can find the upcoming matches.</br>
They see what teams get matched up, when the rounds start and ultimately the winner of the matchup.</br>
The admin confirms the winner of each match and the matchups get updated for the next round
