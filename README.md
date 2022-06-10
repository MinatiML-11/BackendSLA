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
		<pre>http://{host}/api/image/{id}?_method=PATCH</pre>
		<pre>POST Method</pre>
		<pre># Note PATCH method can't carrying so we need to specify method through url</pre>
	- Delete
		<pre>http://{host}/api/image/{id}</pre>
		<pre>DELETE Method</pre>	
- Laundry
	- Create
		<pre>http://{host}/api/laundry</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/laundry</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/laundry/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/laundry/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/laundry/{id}</pre>
		<pre>DELETE Method</pre>
- Order
	- Create
		<pre>http://{host}/api/order</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/order</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/order/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/order/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/order/{id}</pre>
		<pre>DELETE Method</pre>
- Price
	- Create
		<pre>http://{host}/api/price</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/price</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/price/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/price/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/price/{id}</pre>
		<pre>DELETE Method</pre>
- Role
	- Create
		<pre>http://{host}/api/role</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/role</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/role/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/role/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/role/{id}</pre>
		<pre>DELETE Method</pre>
- Service
	- Create
		<pre>http://{host}/api/service</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/service</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/service/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/service/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/service/{id}</pre>
		<pre>DELETE Method</pre>
- Service List
	- Create
		<pre>http://{host}/api/service-list</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/service-list</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/service-list/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/service-list/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/service-list/{id}</pre>
		<pre>DELETE Method</pre>
- Status Order
	- Create
		<pre>http://{host}/api/status-order</pre>
		<pre>POST Method</pre>
	- Get all
		<pre>http://{host}/api/status-order</pre>
		<pre>GET Method</pre>
	- Get single item
		<pre>http://{host}/api/status-order/{id}</pre>
		<pre>GET Method</pre>
	- Update
		<pre>http://{host}/api/status-order/{id}</pre>
		<pre>PATCH Method</pre>
	- Delete
		<pre>http://{host}/api/status-order/{id}</pre>
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

## - Other requests are almost the same, there is a difference only in the body of the request
- Clothes
	- Create
		<pre>
		{
		    "item_id": "code for cloth",
		    "item_description": "description"
		}
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
		{
		    "item_id": "code for cloth",
		    "item_description": "description"
		}
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Image
	- Create
		<pre>
			Please use form-data
			fill required
			*order_id (order id)
			*image_name (image file)
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
			Please use form-data
			fill required
			*order_id (order id)
			*image_name (image file)
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>	
- Laundry
	- Create
		<pre>
		{
			'user_id' : user_id,
		        'name' => "laundry name",
		        'address' => "address",
		        'longlat' => "longlat or latlong"
		}
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
		{
			'user_id' : user_id,
		        'name' => "laundry name",
		        'address' => "address",
		        'longlat' => "longlat or latlong"
		}
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Order
	- Create
		<pre>
		# Please test use form-data
		user_id = user_id
		laundry_id = laundry_id
		item = clothes_id:qty,clothes_id:qty
		# Note for item
		# every pair sparate by ',' comma and value sparate by ':'
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
		# Please test use form-data
		user_id = user_id
		laundry_id = laundry_id
		item = clothes_id:qty,clothes_id:qty
		# Note for item
		# every pair sparate by ',' comma and value sparate by ':'
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Price
	- Create
		<pre>
		{
		    "clothes_id" : 1,
		    "laundry_id" : 4,
		    "price": 4000
		}
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
		{
		    "clothes_id" : 1,
		    "laundry_id" : 4,
		    "price": 4000
		}
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Role
	- Create
		<pre>
		{
		    "role" : "role name",
		}
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		{
		    "role" : "role name",
		}
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Service
	- Create
		{
		    "laundry_id": laundryid,
		    "service_list_id": service list id,
		    "price": price
		}
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		{
		    "laundry_id": laundryid,
		    "service_list_id": service list id,
		    "price": price
		}
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Service List
	- Create
		<pre>
		{
		    "name": "{{serviceName}}"
		}
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
		{
		    "name": "{{serviceName}}"
		}
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>
- Status Order
	- Create
		<pre>
		{
		    "name": "status order"
		}
		</pre>
	- Get all
		<pre>
		"No data request require except token"
		</pre>
	- Get single item
		<pre>
		"No data request require except token"
		</pre>
	- Update
		<pre>
		{
		    "name": "status order"
		}
		</pre>
	- Delete
		<pre>
		"No data request require except token"
		</pre>
