## how to run and setup project 

1.Clone Then Project From git. </br></br>
2.Go to Project workspace and run command composer install. </br></br>
3.Open .env which is located in project root folder add you database configrations. </br></br>
4.run migration using command php artisan migrate. </br></br>
5.run seeder using command php artisan seed. </br></br>
6.For automation inserting post i made scheduler for it run command php artisan schedule:run or you can simply run php artisan blogpost:hourly .it will get post from api and add to table undes assigned to admin . </br></br>
7.after all this thing done you can run php artisan serve. </br></br>