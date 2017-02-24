/*
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/

//
// CKEDITOR.addTemplates("default",
//
//     {imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"templates/images/"),templates:[
//         {
//             title:"Gambino",
//             image:"template1.gif",
//             description:"One main image with a title and text that surround the image.",
//             html:'<style> .article h1 { margin: 0 0 41px; text-align: center; font-size: 40px; font-weight: normal; text-transform: uppercase; } .article h2 { font-size: 35px; line-height: 40px; font-weight: normal; text-transform: uppercase; text-align: center; padding-top: 12px; margin: 0 0 20px; } .article { padding-top: 24px; font-size: 16px; line-height: 29px; } ul.list { list-style: none; padding: 0 0 0 25px; margin: 0 0 50px; } ul.list li { padding: 0 0 0 70px; position: relative; margin: 0 0 11px; } ul.list li:before { position: absolute; top: 6px; left: 0; width: 17px; height: 17px; border-radius: 50%; background: #fece62; content: \'\'; } </style> <div class=\"content article\"> <h1>Nonstop <strong>Casino</strong></h1> <div class=\"animate-top js-base\"> <p>Nonstop Casino is a Facebook application that contains most popular casino games such as Texas Hold’em Poker, Blackjack, Slot Machines, Roulette, Video Poker and Craps. NS Texas Hold\'em is also available on mobile devices (iOS and Android devices) and is fully compatible with Facebook application. That means you can enjoy multi-player experience with your FB friends, create your own NS Club and enjoy great bonuses on mobile the same way as on web. Play, bluff, win and make friends with players from all over the world from the comfort of your hand. </p> <h2>FEATURES</h2> <ul class=\"list\"> <li>Unique steampunk style</li> <li>The essence of social Casino</li> <li>Play at a wide range of chip stakes levels</li> <li>Public &amp; Private &amp; VIP tables</li> <li>Ranking System</li> <li>Quick Start with Starting Chips</li> <li>Achievements</li> </ul> </div> </div> '
//         },
//         {
//             title:"Image and Title1",
//             image:"template1.gif",
//             description:"One main image with a title and text that surround the image.",
//             html:'1<h3\x3e\x3cimg src\x3d" " alt\x3d"" style\x3d"margin-right: 10px" height\x3d"100" width\x3d"100" align\x3d"left" /\x3eType the title here\x3c/h3\x3e\x3cp\x3eType the text here\x3c/p\x3e'
//         },
//         {title:"Strange Template",image:"template2.gif",description:"A template that defines two columns, each one with a title, and some text.",
// html:'\x3ctable cellspacing\x3d"0" cellpadding\x3d"0" style\x3d"width:100%" border\x3d"0"\x3e\x3ctr\x3e\x3ctd style\x3d"width:50%"\x3e\x3ch3\x3eTitle 1\x3c/h3\x3e\x3c/td\x3e\x3ctd\x3e\x3c/td\x3e\x3ctd style\x3d"width:50%"\x3e\x3ch3\x3eTitle 2\x3c/h3\x3e\x3c/td\x3e\x3c/tr\x3e\x3ctr\x3e\x3ctd\x3eText 1\x3c/td\x3e\x3ctd\x3e\x3c/td\x3e\x3ctd\x3eText 2\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\x3cp\x3eMore text goes here.\x3c/p\x3e'},
//         {title:"Text and Table",image:"template3.gif",description:"A title with some text and a table.",
// html:'\x3cdiv style\x3d"width: 80%"\x3e\x3ch3\x3eTitle goes here\x3c/h3\x3e\x3ctable style\x3d"width:150px;float: right" cellspacing\x3d"0" cellpadding\x3d"0" border\x3d"1"\x3e\x3ccaption style\x3d"border:solid 1px black"\x3e\x3cstrong\x3eTable title\x3c/strong\x3e\x3c/caption\x3e\x3ctr\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3c/tr\x3e\x3ctr\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3c/tr\x3e\x3ctr\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3ctd\x3e\x26nbsp;\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\x3cp\x3eType the text here\x3c/p\x3e\x3c/div\x3e'}]});