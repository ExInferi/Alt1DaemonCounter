# Alt1 Toolkit Counter app

I wanted to play around with running daemons in Alt1, and this little counter is the result of my playtime. Nothing fancy, just number-go-up. 🤷🏻‍♀️  
The daemon state will update every 50 seconds to update the count, which will be displayed in the app, Alt1 Toolbar with timestamp and a Windows notification. Every 6 seconds there will be a `console.log()` with the current state and an offset timestamp, for comparison to the Toolbar.

## Setup

> [!WARNING] 
> This app is a simple example and the code is not suitable for production. It has no validation, auth, error handling, rate limiting etc. 

This has a PHP 7.0+ "backend", so requires some sort of webserver. I use Apache through XAMPP.  
The app has a virtual host set up in `conf/extra/httpd-vhosts.conf`, a bit like this:

```
<VirtualHost *:80>
  ServerName alt1.local
  DocumentRoot "path\to\repo"
  <Directory "path\to\repo">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
```
Also important to update the systems hosts file with `127.0.0.1    alt1.local` in order to resolve for the virtual host.


## Installation

After setup, you can install the app by going to http://alt1.local/daemon in the Alt1 browser and click the 'add app'-button. Should that for some reason fail, you can also navigate to `alt1://addapp/http://alt1.local/daemon/appconfig.json`.

## Usage

Play around with opening and closing both the app and Alt1 Toolkit to learn more about how daemons work. To stop the app spamming the counts, click the button that's so conveniently labelled. Right click -> Reload to start again from 0. 