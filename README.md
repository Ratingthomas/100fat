# 100FAT

> Please don't clone this github repository directly! Download a release from the [Releases](https://github.com/Ratingthomas/your-house/releases) page. 

A simple application where you can modify a house.

## Requirements
- PHP 7.4 or higer

## How to install?
1. Upload the website files to your webserver.
2. Configure the .htaccess
3. Go to you website.

## How to configure the .htacces?
Make sure your configure the `RewriteBase` to the root of your project. 

For example: 
You want to visit the website on `mywebsite.com/house`, then you need to configure the `RewriteBase` as following:
```
RewriteBase /house
```
