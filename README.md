# phpapi
crud api using php
The following are my endpoints

http://54.82.197.14/php/api/create.php
{
   ‘name’ : ‘india’,
   ‘code’ : ‘91’,
  ‘population’ : ‘1B’
}

http://54.82.197.14/php/api/read.php - To get all countries  
http://54.82.197.14/php/api/read.php?code=91 - To get country with code
http://54.82.197.14/php/api/update.php?code=91 - To update country 
{
   ‘name’ : ‘india’,
   ‘code’ : ‘91’,
  ‘population’ : ‘1B’
}

http://54.82.197.14/php/api/delete.php?code=91  - To Delete Country
