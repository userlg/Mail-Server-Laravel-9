# Mail Server Laravel 9

![ laravel ]( assets/laravel.png )
![ php ]( assets/php.png )
![ composer ]( assets/composer.png )
![ node ]( assets/node.png)
![ vite]( assets/vite.png)
![ mysql]( assets/mysql.png)

### A simple mail server with the unit test and the smtp mail service active. This app allow you send an email to the creator of this app. Are you lucky ??
Send a email and try!!
-------------------
![ EmailLogo](https://i.imgur.com/4BELzPD.png)
-------------------
# Requirements

+ php 8.1

+ Laravel 9

+ Nodejs (16 or Higher)

+ Mysql

+ Gmail account with access app code
-----------
# Installation
+ Clone the github repository
```
git clone https://github.com/userlg/Mail-Server-Laravel-9
```
+ Create the .env file and use your credentials. The following command only applies to linux
```
touch .env
```
+ Next step install all dependecies
```
composer install
```
```
npm install 
```
+ Do the migrations
```
php artisan migrate
```
+ Then only left run the project
```
php artisan serve
```
```
npm run dev
```
+ Generate the assets Builds
```
npm run build
```
+ Turn on the queue. This project works in the background with jobs and queue to improve the user experience
```
php artisan queue:work
```
+ Note: This project was tested on Windows 10.
-----------
# Screenshots
+ General cheme of the mail server

![ scheme]( assets/Scheme.png)

+ Project dark mode implement with tailwind
![ img1 ](assets/img1.png)
![ img2 ](assets/img2.png)
![ img3 ](assets/img3.png)
![ img4 ](assets/img4.png)
+ Security scan of mailtrap
![ img5 ](assets/img5.png)
+ Mailtrap spam report results
![ img6 ](assets/img6.png)
![ img7 ](assets/img7.png)
![ img8 ](assets/img8.png)
+ Finally the email recieved after the verification code process
![ img9 ](assets/img9.png)
+ Checking the mailtrap inbox
![ tests ](assets/test-coverage.png)
## The test coverage 91% 

-----------
### Created by Userlg