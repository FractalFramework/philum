Philum
CMS, Articles Agregator
Free License GNU/GPL
====================

#Overview
- save articles from the web
- edit on place
- deployment via an Api
- link articles in severale ways
- use [:connectors] instead of html (tags as Apps)
- `msql` is a php-database
- each object in the pages come from modules
- create/change designs easily
- can be used as a desktop
- high level of personalization
- create apps easily
- the fastest CMS in the world !!! >0.1s !
- capable of withstanding high traffic on low-cost servers
- deploy mirror sites and secondary servers for images and videos
- 100% handmade, 0% facebook, 0% google and others techno-lobbies
- continuous update

#Installation
- createdatabase `mysite`
- ALTER DATABASE `mysite` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
- set init variables in /conf/mysite.com.php
- open `/install.php`
- instructions to install a fresh new server in `vps.txt`
- auto-updates
- first user will be the `node` name, associated to main articles, css, user folder, and msql user. That let use the same system for differents sites.

#settings
At beginning, params and config come from `/msql/system`. They are copied in `/msql/server`.
Several params, options and abilities are coming from these tables of datas.
- `config` (hub) let admin set usual general configs.
- `config` (sys) let set config for server
- `params` are more often editables params for articles templates, etc.
- `restrictions` are on/off abilities and variables for templates
In the general term, params are set 1) globally, 2) locally, 3) punctually.

#Css 
Css are edited with css editor.
- The `global` steelsheet (table 1) is built from editor updates. Don't change it, il will be refres at the next update.
- The Admin also have a system stylesheet (table 2).
- The démo start with a `classic` stylesheet (table 3).
- User can use any other tables to declinate stylesheets.
- The user stylesheet can be appended with new definitions from updated `classic`. 
Good to know : modules have ids reached by css.

#Authes
- After install, you become superadmin (level 7).
- You can let your users create their own blogs (level 6).
- You can delegate admin of design (level 5),
- publication to editors (level 4) and members of staff (level 3)
- optionnnaly let access to trackbacks (level 2) or articles (level 1)
You can add layers (nodes) to repeat all that for others domains.

#Precautions
- Philum is a high-level CMS
- you can use it without touching anything, but you can find things that are very complicated to understand. We apologize for that. It's a professional tool.
In fact, lot of evolutions of the systems are keeped along the times and decades. Most of them are kewl, and more recents, slower, are nice. So we often can do the same thing by differents ways.

#The Api system
All the contents inside the software come from the magical Api.
It can be called from several ways. The most recent way is in the json-sytle.
Modules, connectors of Apps can use datas from the Api.
Datas can be distributed to visitors.

#Modules
Modules are blocs of contents in the pages.
The editor of modules is `/admin/console`.
- system modules are there for general configs of modules, like preferences, `artmod` (modules associated to articles), etc.
- dev modules are there for tests
- blocks of modules are `<div>' of modules.
- Each module can contain other blocks recursively.
In the general way, there is three types of modules : 
- softwares modules, are built with 1) content, 2) expression of content
- api modules are special usages of the general Api of Articles
- litteral modules render a designed content.
The most intersting about modules, is they can design all your site, using `conditions` :
- `home` let display module at home
- `cat` let display module in a stream of contents
- `art` let display module while reading articles
You can specialize theses `conditions` to objectives contents or `contextes`.

#Connectors
Connectors are tags in the contents.
It is a revolutionary way to compose articles.
The idea is to let and control which tags are publics, admin or superadmin.
The utility is to let load Apps inside a content. For example, a video `Youtube` will call the video system for display a thumbnail in place to load the iframe. For that you use : [id:video]. It recongnize yhe ID of Youtube or any other providers.
- All the imported articles are converted in `connectors` : that let cleanup the code properly and control everything.
- You can add any application, it will be joinable via his connector automaticalle : `[hello:myapp]`.
- Connectors can build micro-templates, forms, mathematic expressions, svg graphics, etc.
There is actually hundred of connectors.

#Apps
Apps are microapplications built from `model.php`.
In general term, their is different places for Apps (and everything is an App) :
- `/prog` contains main software :
-- `/prog/_` contains critical libraries
-- `/prog/a` contains system features
-- `/prog/b` is for admin system
-- `/prog/c` contains server features
-- `/prog/d` contains optionnal features
- `/plug` contains external features
- `/plug/admin` contains admin of external features
- `/plug/app` contains essential apps
- `/plug/..` all others Apps (edition, sciences, etc.)

#Message to the world
Dependency is slavery.
This work is made alone, with exclusive tools for working alone, and everything is much faster and more fun, innovative and scalable.
Nobody likes it, but you are wrong, lol
Because this software at least has been working continuously for twenty years and is always at the cutting edge. And also, I've already said it but it needs to be said again, it consumes 10,000 times less electricity than the others.

#Philum 2004-2026
https://github.com/FractalFramework/philum
http://philum.ovh
