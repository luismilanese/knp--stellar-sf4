## Installed recipes
- ```sec-checker``` for development: ```composer require sec-checker --dev```
- ```profiler``` for development: ```composer require profiler --dev```
- ```debug``` for development: ```composer require debug --dev```
- ```asset``` enables ```asset()``` function in twig

## Packs
The ```debug``` dependency is a pack. That is, it's a collection of dependencies targeted at a purpose, in this case, help 
us to debug our application. However, you have little control over the versions or the packages installed. For this reason, 
Symfony Flex has the ```unpack``` command, which will replace the pack with the its packages and then you can select whatever 
version you want for a package or just remove the packages you don't need.