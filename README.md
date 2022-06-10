<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laundry Project
### Cloud Computing Team
- Ali Shoddiqien <a href="https://github.com/odik91"><img src="https://github.githubassets.com/images/modules/logos_page/Octocat.png"  width="30px" alt="ali shoddiqien"></a>
- Khadafi

# Dicumentation
## - Overview
- This project uses laravel version 8.1 Documentation about Laravel can be seen on the official laravel website
- Oatuh using laravel passport
- PHP version using 8.1
- Require composer package
- Please enable php extension requirement before deploy to live production
- Database using MySQL
- For test api we recommended use Postman
- Auth using Bearer token
## - API Link
- Register
<pre>http://{host}/api/register</pre>
<pre>POST Method</pre>
- Login
<pre>http://{host}/api/login</pre>
<pre>POST Method</pre>
- Clothes
	- Create
		<pre>http://{host}/api/clothes</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/clothes</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/clothes/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/clothes/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/clothes/{id}</pre>
		<pre>DELETE Method</pre>
- Image
	- Create
		<pre>http://{host}/api/image</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/image</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/image/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/image/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/image/{id}</pre>
		<pre>DELETE Method</pre>	
## - Route Lists
### - Register request
This API requires registration before use in order to access the features provided on each route with the POST, GET, PATCH and DELETE methods.
#### Route Register explanation
Route
        http://{host}/api/register

##### Postman setup for registration
- Use POST method
- In body please use *raw* and set for *json*
- Request body shoud look like
<br>
<pre>
{
    "name": "{{username}}",
    "email": "{{registerEmail}}",
    "password": "{{password}}",
    "password_confirmation": "{{password}}",
    "role_id": "{{role_id}}"
}
</pre>
<br>

### - Login
Route
        http://{host}/api/login

##### Postman setup for registration
- Use POST method
- In body please use *raw* and set for *json*
- Request body shoud look like
<br>
<pre>
{
    "email": "{{registerEmail}}",
    "password": "{{password}}"
}
</pre>
<br>
After success login you will recive respond look like
<br>
<pre>
{
    "message": "You have login successfully",
    "token": "{{Please save this token for later}}",
    "user": {
        "id": *id,
        "name": *username,
        "email": *email,
        "email_verified_at": *date,
        "role_id": *role_id,
        "deleted_at": *date,
        "created_at": *date,
        "updated_at": *date
    }
}
</pre>
<br>

### - View Profile
Route
        http://{host}/api/profile

##### Postman serup for view profile
- Use GET method
- In tab Authorization please select Type -> Bearer Token and for value we use token provided from login response
you will recive respond look like
<br>
<pre>
[
    {
        "id": 1,
        "name": "user",
        "email": "testuser@test.com"
    }
]
</pre>
<br>

### - Add Service
Route
        http://{host}/api/service-list

##### Postman setup for Add Service
- Use POST method
- In tab Authorization please select Type -> Bearer Token and for value we use token provided from login response
- In body please use *raw* and set for *json*
- Request body shoud look like
<br>
<pre>
{
    "name": "{{serviceName}}"
}
</pre>
<br>
After success will recive respond look like
<br>
<pre>
{
    "message": "success",
}
</pre>
<br>

### - View All Service
Route
        http://{host}/api/service-list

##### Postman setup for view all sevice
- Use GET method
- In tab Authorization please select Type -> Bearer Token and for value we use token provided from login response
you will recive respond look like
<br>
<pre>
{
    "message": "success",
    "service_list": [
        {
            "id": 1,
            "name": "pickup"
        },
        {
            "id": 2,
            "name": "delivery"
        },
        {
            "id": 3,
            "name": "wash"
        },
        {
            "id": 4,
            "name": "iron"
        }
    ]
}
</pre>
<br>

## - Stack

## - Stack

## - Stack

## - Stack
