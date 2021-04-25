# **Emissão Boletim - Laravel**  
------ 
This is a study project started in `2019` that has as objective to launch a school note and print a bulletin for school units in a school system.

The idea for the project came from my day-to-day work as an IT Professional in a school system. The Project has no _**intention of being used in production**_. It is just a way to improve my knowledge on the programming. 

This project uses **[Laravel](https://laravel.com/)**, which is a framework for web applications wich using architecture MVC. **Laravel** is known in the market, has accessible **[documentation](https://laravel.com/docs/8.x)** and the use of framerwok allows the developer to focus on requirements and business rules as well as facilitate maintenance. 

Because of dependency of a database was a decision for this project using **[Docker](https://www.docker.com/)** with Docker Compose. It creates the appropriate environments for the application and the database automatically. Docker is not a traditional virtualization system. Docker facilitates the creation and management of isolated environments. and docker-compose is a tool for defining and running multi-container Docker applications and allows works in all environments: production, staging, development, testing, as well as CI workflows.

## **VIEW SCREENSHOT**
------ 
| | | |
|-|-|-|
|**Dashboard**| **Enturmação** | **Notas** |
| ![UI - Dashboard](https://raw.githubusercontent.com/miguelsmuller/emissao-boletim/master/docs/images/ui-dashboard.jpeg "UI - Dashboard") | ![UI - Enturmação](https://raw.githubusercontent.com/miguelsmuller/emissao-boletim/master/docs/images/ui-enturmacao.jpeg "UI - Enturmação") | ![UI - Notas](https://raw.githubusercontent.com/miguelsmuller/emissao-boletim/master/docs/images/ui-notas.jpeg "UI - Notas") |


## **PUTTING THE PROJECT TO RUN**  
------
As was said earlier this project use `docker` and the benefits of `docker-compose`.

### **Start up application** 
- Builds, (re)creates, starts, and attaches to containers for a service - `docker-compose up --detach --force-recreate --build`
- Access the container - `docker-compose exec CONTAINER_NAME bash`

### **Install Dependencies**  
- Installing initial dependencies of PHP - `docker-compose exec app composer install`
- Installing initial dependencies of NPM - `docker-compose exec app npm install`

It is necessary at this point to configure the `.env` file.
The value of the DB_HOST variable in `.env` is the name of the database container.  

### **Creating and Populating **  
- Create Database Schema - `docker-compose exec app php artisan migrate`
- Seed Database with test data - `docker-compose exec app php artisan db:seed`  

### **Using the application**  
If the contenders project are already allocated in Docker will not be necessary to build them and create, and will not need to also install the several dependencies.  

- If the container is not running starts her - `docker-compose start`  

URL to access: `http://localhost:100`

## **Contributing**
------
1. [Fork it!](https://help.github.com/articles/fork-a-repo/)
2. [Configuring](https://help.github.com/articles/configuring-a-remote-for-a-fork/) a remote for a fork
3. [Syncing](https://help.github.com/articles/syncing-a-fork/) a fork with the latest version
4. Create your feature branch: `git checkout -b feature-123`
5. Commit your changes: `git commit -m 'Commit message'`
6. Push to the branch: `git push origin feature-123`
7. [Submit a pull request](https://help.github.com/articles/using-pull-requests/) :D

##### **Before commit, double check your code. Please dude.**
- Always check a branch that is being used: `git status`
- Execute a `git pull` to keep your checkout up-to-date
- Invoke a `git diff --cached` before committing
- **NOT COMMIT BEFORE RUNNING THE PROJECT LOCALLY AND SEE THE CHANGES RUNNING**
- **MAKE SURE THE CHANGES WORK**

> **[Here is a quick guide to git command](https://gist.github.com/leocomelli/2545add34e4fec21ec16)**

## **Changelog**
------
= **1.0.0 - 2019-01-11** =  
Project released  