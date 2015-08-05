<?php

class Functions {
	
	public function pagination($limit,$adjacents,$rows,$page){
		$pagination='';
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$prev_='';
		$first='';
		$lastpage = ceil($rows/$limit);
		$next_='';
		$last='';

		if($lastpage > 1)
		{
			//previous button
			if ($page > 1)
				$prev_.= "<li><a href='#' class='page-numbers' data-id=\"$prev\">previous</a></li>";
			else{
				// $pagination.= "<li class='prev disabled'><a href='#' data-id=\"$prev\">previous</a></li>";
				}

			//pages
			if ($lastpage < 5 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{
			$first='';
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						// $pagination.= "<span class=\"current\">$counter</span>";
						$pagination.= "<li class='active'><a href='#' class='page-numbers' data-id=\"$counter\">$counter</a></li>";
					else
						$pagination.= "<li><a href='#' class='page-numbers' data-id=\"$counter\">$counter</a></li>";
				}
				$last='';
			}
			elseif($lastpage > 3 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				$first='';
				if($page < 1 + ($adjacents * 2))
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							// $pagination.= "<span class=\"current\">$counter</span>";
							$pagination.= "<li class='active'><a href='#' class='page-numbers' data-id=\"$counter\">$counter</a></li>";
						else
							$pagination.= "<li><a href='#' class='page-numbers' data-id=\"$counter\">$counter</a></li>";
					}
				$last.= "<li><a class='page-numbers' href='#' data-id=\"$lastpage\">Last</a></li>";
				}

				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
			       $first.= "<li><a class='page-numbers' href='#' data-id=\"1\">First</a></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							// $pagination.= "<span class=\"current\">$counter</span>";
							$pagination.= "<li class='active'><a href='#' data-id=\"$counter\">$counter</a></li>";
						else
							$pagination.= "<li><a class='page-numbers' href='#' data-id=\"$counter\">$counter</a></li>";
					}
					$last.= "<li><a class='page-numbers' href='#' data-id=\"$lastpage\">Last</a></li>";
				}
				//close to end; only hide early pages
				else
				{
				    $first.= "<li><a class='page-numbers' href='#' data-id=\"1\">First</a></li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							// $pagination.= "<span class=\"current\">$counter</span>";
							$pagination.= "<li class='active'><a href='#' class='page-numbers' data-id=\"$counter\">$counter</a></li>";
						else
							$pagination.= "<li><a class='page-numbers' href='#' data-id=\"$counter\">$counter</a></li>";
					}
					$last='';
				}

				}
			if ($page < $counter - 1)
				$next_.= "<li class='next'><a href='#' class='page-numbers' data-id=\"$next\">next</a></li>";
			else{
				//$pagination.= "<span class=\"disabled\">next</span>";
				}
			$pagination = "<ul class=\"pagination pagination-sm\">".$first.$prev_.$pagination.$next_.$last;
			//next button

			$pagination.= "</ul>\n";
		}

		return $pagination;
	}

	public function generatePassword($length=9, $strength=0) {
	    $vowels = 'aeuy';
	    $consonants = 'bdghjmnpqrstvz';
	    if ($strength & 1) {
	        $consonants .= 'BDGHJLMNPQRSTVWXZ';
	    }
	    if ($strength & 2) {
	        $vowels .= "AEUY";
	    }
	    if ($strength & 4) {
	        $consonants .= '23456789';
	    }
	    if ($strength & 8) {
	        $consonants .= '@#$%';
	    }

	    $password = '';
	    $alt = time() % 2;
	    for ($i = 0; $i < $length; $i++) {
	        if ($alt == 1) {
	            $password .= $consonants[(rand() % strlen($consonants))];
	            $alt = 0;
	        } else {
	            $password .= $vowels[(rand() % strlen($vowels))];
	            $alt = 1;
	        }
	    }
	    return $password;
	}
}

?>
