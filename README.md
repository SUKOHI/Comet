Comet
=====

A system that provides a chat system like Comet using PHP + JavaScript(jQuery)

[Usage]: 

After placing all files into proper folder, access index.html.
Then if you save text on data/data.dat, the text will appear on the page.

So, if you want to pluck chat data from DB like MySQL.
You should change the following line in comet.php.

if($value = file_get_contents('data/data.dat')) {
		
   return true;	// When data exist, return true;
		
}

If you'd like to know more, index.html and comet.php could be able to help you for it because the files themselves have examples.

That's all.;)

[License]:

I am not familiar with licenses. 
So decide it by yourself.
I mean if you like MIT, it's MIT license and so on...
