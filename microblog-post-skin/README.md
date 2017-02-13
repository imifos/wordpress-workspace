# microblog-post-skin

Plugin Name: Micro Post Support

Adds a new type of posts to the wordpress blog - Micro Posts - and adds a css class
to these entries so their appearance can be adapted on the blog front page.

This is quick'n dirty code, crafted for my own blog/theme only. It's not a
fully functional wordpress plugin.

I use the Annina theme and the following CSS to make it look nice on my front-page:

'''
.type-microposts .content-annina {
background: #CCCCCC;
border: 2px solid #990404;
}

.type-microposts .content-annina:before {
content: "Micro Post";
color:#990404;
}

.type-microposts .entry-header {
display:none;
}

.type-microposts .entry-footer {
display:none;
}
''''

(Note: I'm aware that it's bad to add text to pages using CSS, so please do not do this at home :)

Free software, @imifos, 2/2017

