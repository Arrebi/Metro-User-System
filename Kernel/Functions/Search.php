<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

require('../../Init.php');

class Search
{
	public static function Message()
	{
		if(!empty($_POST['form']))
		{
			$q = mysqli_query(Site::$conn,"SELECT * FROM users WHERE firstname LIKE '%". $_POST['form']  ."%'");
			while($u = mysqli_fetch_assoc($q))
			{
			?>
				<div class="fromU" onclick="AddSearch('<?=$u['email'];?>');"><?=$u['firstname'];?> <?=$u['lastname'];?></div>
			<?php
			}
		}
	}
}

new Search;

Search::Message();

?>