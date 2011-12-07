# phpMyXBMC  
This is an early version of a website GUI for viewing movies/shows and stats about your XBMC library when exported to MySQL.  

This will only work with newer browsers with support for the latest versions of CSS and HTML. 
So if you are using Internet Explorer this won't work (and even if it would work you shouldn't use IEr anyway).

## Languages and stuff used  
> PHP  
> HTML (version 4 and 5)  
> CSS3  
> LESS CSS  
> PDO MySQL  
> jQuery  
> Normalize CSS from HTML5 Boilerplate  

## ToDo  
* The DB connection  
* Everything else ;)  

## Special thanks to  
> ccMatrix  
> [Studio movie and network logos](https://github.com/ccMatrix/StudioLogos)  

## Worth pointing out  
* Every time (if) an error occurs it will be printed to log/PDOErrors.log which comes in handy when something goes wrong and you want to find out why. This is very unsecure so if you're using this application on a live page you'd like to remove the function in functions.php. It's in the function db\_handle and named file\_put\_contents().