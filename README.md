CAH-Generator
=============

Imagemagick is a command line dependency, not a PHP module one.

Uses imagemagick to create Cards Against Humanity images for printing on actual cards through a print studio.

Originally I'd planned on generating the entire card on the fly. However, my lack of imagemagick acumen, combined with how CPU intensive the process is for the shitty host I have this hosted on made that infeasable. So I start with the cards as fully formed as I can, and simply add the text. The font file is ommited, because it's not a free font, and I don't have the rights to distribute it.

You can see it in action at:
https://enderandrew.com/CAH-Generator/

For those interested in making their own card images from scratch, 'notes.rtf' has the closest I have to something you can use to recreate the steps I took. Every time I tried something new that I felt I might want to reference back to, I threw it in there. It's by no means complete, will probably frustrate you more than help you, and I apologize in advance for not caring.


Fork: I have been updating this code to work on modern servers. I have also added several things. This is still a work in progress I will update as I fix stuff. Be paient please.

UPDATE: The code is fully working now, Remember to chmod -R 777 your entire working directory. This will allow the cards to show and download.
        See it working on the newest version at http://erftech.com/CAH
