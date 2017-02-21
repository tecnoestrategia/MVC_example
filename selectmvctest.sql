select
		pages.id_page as idpage,		
		pages.title as page_title,
		pages.content as page_content,
		pages.create_on as page_data_creation,
		DATEDIFF(CURRENT_TIME(),pages.create_on) as days_of_life,
		users.name as name_of_creator,
		users.avatar as avatar_of_creator											
	from
		pages		
   left join users 
		on (users.id_user = pages.id_user)
	where pages.id_page = 3