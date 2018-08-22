# Comet

A system that provides a chat system like Comet using PHP + JavaScript(jQuery)

[Demo](https://chat.capilano-fw.com)

# Usage

After placing all files into a proper folder, access index.html.
Then if you save text on data/data.dat, the text will appear on the page.

So, if you want to pluck chat data from DB like MySQL.
You should change the following line in comet.php.

	if($value = file_get_contents('data/data.dat')) {

	   return true;	// When data exist, return true;

	}

If you'd like to know more, index.html and comet.php could be able to help you for it because the files themselves have examples.

That's all.;)

# License
This package is licensed under the MIT License.

Copyright 2017 Sukohi Kuhoh
