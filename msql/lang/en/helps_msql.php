<?php 
return ['_'=>['title','description'],
1=>['edit header','edit the header that names the columns'],
2=>['backup','makes a backup of the table'],
3=>['restore','restores the old saved version if it exists'],
4=>['clone','creates a table from another, incremented if it is a versioned table'],
5=>['import','specify the path to the table, can receive a web_url'],
6=>['add','add the imported table to the end of the first one'],
7=>['merge','adds data from another table to the current table and updates the most recent if there is a \'last-update\' column'],
8=>['merge cols','adds the columns of the imported table'],
9=>['new','create a new table'],
10=>['clear','clears a table of its data'],
11=>['delete','appears if the file is not compliant'],
12=>['repair','tries to repair a non-compliant file (data not appearing)'],
13=>['equalise cols','puts the same number of columns in each row'],
14=>['add col','adds a column'],
15=>['del col','deletes the last column'],
16=>['connectors','table data in connector format'],
17=>['import header','import headers from a table'],
18=>['array','array of data in php format'],
19=>['order','reorder the entries in alphanumeric order, the first column is named \'1'],
20=>['renumber','re-number entries starting from 1, without changing the order (some databases forbid this function)'],
21=>['swap','swap two columns (e.g. 0/1)'],
22=>['add header','add a header'],
23=>['del header','remove header'],
24=>['add index','add an index'],
25=>['del index','deletes the key column'],
26=>['update','notifies language tables of new entries in a \'system\' table that need translation'],
27=>['backup msql','makes a backup of the entire microsql database'],
28=>['add entry','add an entry'],
29=>['compare','compare two tables'],
30=>['del bckp','delete the backup'],
31=>['rename','rename table'],
32=>['duplicate','duplicate table'],
33=>['intersection','common entries'],
34=>['connections','common entries'],
35=>['switch','common entries'],
36=>['merge','common entries']]; ?>