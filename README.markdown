## Koncept, a PHP5 mockup/wireframe sharing system

By Michael Whalen

Koncept is a really *really* simple system I created in a few hours to share some mockups with a client. Rather than emailing a collection of them with lots of text or uploading a lot of images and copying url's to them, I figured a nice structured system would be best. I also managed to create a system that doesn't require a database at all. The database exists atop the filesystem itself.

VIEW A LIVE DEMO: [http://boxd.in](http://boxd.in)

There is a `projects` directory designed to contain folders for individual projects. Each project folder is named with a slug. In the repo is an example for a current client of mine, Arbesko. Inside of that folder there are any number of screenshots in any type (png, gif, jpg, etc...) and a file called `manifest.json`. 

### The Manifest File

The manifest is a very simple json file with a handful of properties. The name of the project, a breif summary of the project, and then the various items (in an items array) or screenshots. This was built in a few hours as proof-of-concept prototype, hence the name koncept (as it's a concept at the moment, used to share concepts, lulz). 

Each item contains a name string, a src string (filename relative to the manifest file, in fact the files can only be siblings of the manifest) and a description of the screenshot.

### Workflow

The screenshots are stored inside of the project folder alongside the `manifest.json` file. Pretty simple the way everything works. Typical workflow is creating a folder or copying an existing project folder, uploading the screenshots, and editing the `manifest.json` file in your favorite text editor (ahem, TextMate)

### Server Config

The only requirement is the [Savant3](http://phpsavant.com/download/) template system for PHP. I installed with Pear, as suggested on the website.

I built this with PHP5 in a Debian VM. I am using nginx and a fastcgi process, but I am sure that you can get this working with Apache if desired. This is, however, and uber simple experiment that I am sure no one is going to play with so what the heck. Below is my nginx config:

    server {
        server_name  koncept.dev;

        location / {
            root   /home/michael/sites/koncept/;
            index  index.html index.php;
        
            # this serves static files that exist without running other rewrite tests
            if (-f $request_filename) {
                expires 30d;
                break;
            }

            # this sends all non-existing file or directory requests to index.php
            if (!-e $request_filename) {
                rewrite ^(.+)$ /index.php?q=$1 last;
            }
        }

        location ~* ^.+.(jpg|jpeg|gif|png|ico|css|zip|tgz|gz|rar|bz2|doc|xls|exe|pdf|ppt|txt|tar|mid|midi|wav|bmp|rtf|js)$ {
            root /home/michael/sites/koncept;
        }

        location ~ \.php$ {
        
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            include /etc/nginx/fastcgi.conf;

            fastcgi_param  SCRIPT_FILENAME  /home/michael/sites/koncept$fastcgi_script_name;
        
        }
    }

### In the future

This is a real minor sprint in the direction of a system/service I have been meaning to create for a very long time. A simple way to share mockups with clients, and receive feedback on those mockups. I'd definitely like to grow and expand it, and have a handful of ideas in the pipeline. 

 * **Commenting** - I'd like users to be able to make comments on individual mockups, and in a perfect world, annotations to certain parts of the mockup. This is fairly simple to do, but introduces the need for a database. In the short future (hopefully, knock on wood) this koncept will move from being a database-free prototype, to a full fledged saas application.
 * **Enhanced GUI** - For a few hours of work, I have to say that this is pretty good. I've already used it once with a client and am awaiting feedback both on the mockups, heh, as well as the experience using this new "system" over typical emailing of attachments and/or url's to images. The gui can certainly be enhanced with better browsing tools as well as thumbnails for the screenshots. Better text formatting capabilities would be nice as well.
 * **Password protection** - I'd like to integrate user accounts so that projects can have owners, commenters, and spectators. That way an owner (such as myself, a design shop) can create projects and assign commenters (such as the client) and/or spectators (such as a friend or colleague) to participate in viewing and commenting.
 
 