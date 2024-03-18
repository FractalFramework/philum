<?php 
return [1=>['sql','
WHERE TO_DAYS(NOW()) - TO_DAYS(time) <= 1;

SELECT COUNT(id)
FROM `pub_live` 
WHERE DAY(time)=05;

SELECT id, time, TIME_TO_SEC(time)
FROM `pub_live` 
WHERE HOUR(time)=12;

SELECT count(id), GROUP_CONCAT(id) 
FROM `pub_live`
where qb=6
GROUP BY HOUR(time)

SELECT date(time) as day, count(id) as nb_id
FROM `pub_live`
where qb=6
and TO_DAYS(NOW()) - TO_DAYS(time) <= 1
GROUP BY DAY(time)
']]; ?>