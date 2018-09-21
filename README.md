# Document Exporter Kata

The goal of this kata is to refactor the existing code.

The repository contains classes that are representing a document template (made of simple paragraphs) and an exporter that is currently capable of exporting to HTML and JSON. 
We will probably want to extend those options so keep that in mind.

Also since we want to produce nice content, we've decided that we'd like to make sure that no one using our exporter creates documents containing bad words and phrases.
For example we'd like the word `bad` to be replaced with `good`, `problem` with `opportunity` etc.  

And not only that, we'd like to add smileys after each paragraph, to make it even more positive. 

Your job is to add those features. We might even think about more modifications to the paragraphs in the future so please be ready for those. 
Some tests might be failing right now, but feel free to fix it by enabling those features. 

Feel free to rearange the code as you like, but make sure everything is tested.   

