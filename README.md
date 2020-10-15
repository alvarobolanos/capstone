# Heroku

## Heroku Basics

Follow this [heroku link](https://devcenter.heroku.com/articles/heroku-cli) to obtain the heroku command line tool. 

Use this command to login to your heroku account:
`heroku login -i`

## Creating the heroku instance

Navigate to your project's location:
`$ cd ~/capstone`

Then create a new heroku instance:
`$ heroku create`

You should get something like this:
`Creating app... done, ⬢ sleepy-meadow-81798`
`https://sleepy-meadow-81798.herokuapp.com/ | https://git.heroku.com/sleepy-meadow-81798.git`

The first url: `https://sleepy-meadow-81798.herokuapp.com/` is where you can visit your project.

The second url: `https://git.heroku.com/sleepy-meadow-81798.git` is a remote that gets added to your git and where you can push for the project to be published. 

## Composer
In progress...

### composer.json
In progress...

### composer.lock
In progress...

## Pushing to heroku

Navigate to your project's location:
`$ cd ~/capstone`

Use this command to login to your heroku account:
`heroku login -i`

Make sure that you've stagged everything, then commit and leave a message:
`git commit -a`

Git will present you with a vim screen asking you to input a commit message. Press "i" to enter Insert mode and enter your commit message. Once done, press "ESC" and then `wq` to write and quit the vim program.

Now you can push the project to heroku:
`git push heroku`

# Database

## Adding a database to the heroku instance.
In progress...

## Logging into the DB

You will need the contents of the CLEARDB_DATABASE_URL environment variable in the heroku server in order to log into the database.

Run the following command:
```bash
heroku config | grep CLEARDB_DATABASE_URL
```
The contents of the environment variable will be returned and will have the following structure:
```bash
mysql://username:password1:@host/password2?reconnect=true
```

## Importing an SQL file into the DB

Prepare an export of the database. Since I'm using mysqlWorkbench: Server → Data Export. 

Be mindful that the database preparation may vary depending on whether you've already created the capstone database or not. If you indicate mysqlWorkbench to create the schema you may need to edit the file to configure the collation and charset settings

In order to import the sql file into the remote database you will need to connect to the database and pass it the file:
```bash
mysql -u username -h host -p password2 < /path/to/the/file.sql
```

_Note: the file associated with this task is named: capstoneExport.sql in the capstone project._

You will be prompted for yet another password:
```bash
Enter password: password1
```

## Verifying the database

Refer to the "Logging in" section for an explanation of the contents of the CLEARDB_DATABASE_URL environment variable.

Once you have the information of the CLEARDB_DATABASE_URL environment variable use it to populate the command below:
```bash
mysql -u username -h host -p password2
```

You will be prompted for yet another password:
```bash
Enter password: password1
```

You will now see the mysql prompt:
```mysql
mysql>
```
Enter the following command in the mysql prompt to view the tables:
```mysql
SHOW TABLES;
```
This should be your output (based on the current db schema):
```mysql
+----------------------------------+
| Tables_in_heroku_64f710f2172c167 |
+----------------------------------+
| games                            |
| players                          |
| players_scores                   |
| qanda                            |
| scores                           |
+----------------------------------+
```