SELECT
	m.title as movie_title,
	m.year as movie_year,
	*
FROM
	movie as m
	left join studio as s on m.studioid = s.studioid
	left join genre as g on m.genreid = g.genreid
	left join rating as r on m.ratingid = r.ratingid
	left join movietoactor as ma on m.movieid = ma.movieid
	left join actors as a on ma.actorsid = a.actorsid
