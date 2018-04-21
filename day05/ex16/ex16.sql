SELECT COUNT(date) AS "movies"
FROM member_history
WHERE (DATE(member_history.date) > CAST("2006-10-30" AS DATE) AND DATE(member_history.date) < CAST("2007-07-27" AS DATE)) 
OR (MONTH(member_history.date) = 12 AND DAY(member_history.date) = 24);