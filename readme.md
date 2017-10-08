# Library Management System

This is the simplest Library Management System. Easy To Use and maintain. 

## How to install 

First clone the repo

```zsh
	$ git clone https://github.com/zdgithub/library_management_system
	
```

Edit the ENV File then

Then get into the directory 

```zsh

	$ cd library_management_system

```

Now migrate the database 

```zsh

	$ php artisan migrate

```

Seed the dummy data if you need (Optional)

```zsh

	$ php aritsan db:seed

```

Now Run the server


```zsh

	$ php aritsan serve

```

The server will be live on localhost:8000

## Developing Environment
- php>=5.6.4
- Apache2.4