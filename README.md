# phpMyXBMC  
This is an early version of a web application for viewing movies/shows and stats about your XBMC library when exported to MySQL. 

This will only work with newer browsers with support for the latest versions of CSS and HTML.
So if you are using Internet Explorer this won't work (and even if it would work you shouldn't use IE anyway).  

## Installation  
First of all you need your thumbnails folder from XBMC to be placed inside the img folder (/img/Thumbnails).  
This can be done in different ways but in my opinion there are two ways that both work great.

By default your thumbnails folder is located here:  
Windows:  
Linux: **$HOME/.xbmc/userdata/thumbnails**  
Mac OS X:  

## Languages and stuff used  
> PHP with PDO  
> HTML5  
> CSS3  
> LESS CSS  
> MySQL  
> jQuery  

## Special thanks to  
> ccMatrix  
> [Movie studio and network logos](https://github.com/ccMatrix/StudioLogos) 

> necolas  
> [Normalize.css for better browser rendering](https://github.com/necolas/normalize.css/) 

> Joseph Wain  
> [Glyphish Icons](http://www.glyphish.com/) 

> tamplan & narfight @ XBMC Forum  
> [Thumbnail hash script](http://forum.xbmc.org/showthread.php?t=85445)

## Bugs and Insects  
* The hash code generator doesn't work properly when path name contains foreign characters, such as Å, Ä, Ö, Ü, etc.  

## ToDo  
* Ignore "The", "An" and "A" when sorting movies/shows.  
* Fix number sorting, "2" gets sorted before "10" for example
* ~~Fix the PDO Database connection~~  
* Finish the design (mostly CSS)  
* Improve queries for better performance  
* Make the PHP object oriented  
* Fix sessions/cookies (probably more focused on sessions)  
* ~~Don't load all movies/shows on the same page~~  
* ~~Fix the jQuery window resize bug when making a small window larger~~  
* Create a settings page for individual settings per user, saved in DB  