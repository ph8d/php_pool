SELECT title, summary FROM film
WHERE LOWER(summary) LIKE "%vincent%"
ORDER BY film.id_film ASC;