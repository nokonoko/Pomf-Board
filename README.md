# Pomf-Board
 Simple and fast message board.

It's lacking A LOT of features right now, I will work on this... one day.

# Setup
Assuming you have already set up Nginx/PHP/SQLite3 or whatever you wanna use make a DB using 'make_schema.sql' and then edit the settings in 'includes/php/settings.php'. Easy peasy lemon squeezie!

If you want to delete posts older than 10 days from the DB setup to run this in ur crontab or w/e:
```bash
sqlite3 /path/to/db.sq3 "DELETE FROM posts WHERE time <= strftime('%s', datetime('now', '-10 day'));"
```

# Contact
neku@pomf.se or https://twitter.com/nekunekus

# To-Do
Don't be shy, open a issue or pull request.

* ~~Add chars remaining shown for message~~
* Option for DB pruning after X amount of posts
* ~~Option for how many posts should be shown and/or pagination~~
* Posting/fetching using JS?
* Mod functions
* Image support
* Thread support and option for it, default should be no threads
* Quote someone else function, JS?
* Better style, looks horrible right now.
* Much more!
