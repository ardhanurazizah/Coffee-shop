<?php
	require("../connect.php");
	
	$record_per_page = 3;
	$page = '';
	$output= ''; 
	if(isset($_POST["page"]))
	{
		$page=$_POST["page"];
	}
	else
	{
		$page = 1;
	}
	$searchValue="";
	$searchQuery="";
	if(isset($_POST["value"]))
	{
		$searchValue = $_POST["value"];
		if($searchValue !="")
		{
			$key ="";
			$admin = strpos($key,"admin");
			$manager = strpos($key,"quản");
			if($admin>0)
			{
				$key = 1;
			}
			else{	if($manager>0)
					{
						$key = 2;
					}
				}
			if($admin>0 || $manager > 0)
			{
				$searchQuery = "AND id_role = $key";
			}
				else{$searchQuery = " AND (id_em like '%$searchValue%' or 
					lastname like '%$searchValue%' or 
					firstname like '%$searchValue%' or
					email like '%$searchValue%' or
					phone like '%$searchValue%' or
					username  like '%$searchValue%' ) ";
					}
		}
	}
	$start_from = ($page -1) * $record_per_page;
	$sql = "SELECT * FROM employee WHERE 1 ".$searchQuery." LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	<table class="table">
                          <thead class=" text-primary">
                          <th style="text-align:center"> Mã nhân viên </th>
                          <th style="text-align:center"> Tên nhân viên </th>
						  <th style="text-align:center"> Tài khoản </th>
                          <th style="text-align:center"> Email</th>
                          <th style="text-align:center"> Số điện thoại</th>
                          <th style="text-align:center"> Chức vụ</th>
						  <th style="text-align:center">Thao tác</th>
                          </thead>
                          <tbody>';
	while($row =mysqli_fetch_array($result))
	{
		$sql2 = "SELECT * FROM role AS r WHERE r.id_role = $row[id_role]";
		$result2 = mysqli_query($con,$sql2);
		$row2=mysqli_fetch_array($result2);
		$output.='<tr>
									<td width="10%" align="center" style="font-weight:500">'.$row["id_em"].'</td>
									<td width="15%" align="center" style="font-weight:500">'.$row['lastname'] . $row['firstname'].'</td>
									<td width="10%" align="center" style="font-weight:500">'.$row['username'].'</td>
									<td width="20%" align="center" style="font-weight:500">'.$row['email'].'</td>
									<td width="10%" align="center" style="font-weight:500">'.$row['phone'].'</td>
									<td width="10%" align="center" style="font-weight:500">'.$row2["name"].'</td>
									<td width="10%" align="center" >
									<a href="#">
                        				<i class="material-icons">create</i>
                      				</a>
                      				<!--BUTTON XÓA-->
                       				<a href="#">
                         				<i class="material-icons">clear</i>
                      				</a>
									</td>
								</tr>	';
	}
	$output.='</tbody>
                      </table>';
	$page_query = "SELECT * FROM employee WHERE 1 ".$searchQuery."";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link btn btn-social btn-link btn-dribbble" id="1"><i class="material-icons">fast_rewind</i></span>
		<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.($page-1).'"><i class="material-icons">keyboard_arrow_left</i></span>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		$output.='<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.$i.'">'.$i.'</span>';
	}
	if($page<$total_pages)
	{
		$output.='
		<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.($page+1).'"><i class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.$total_pages.'"><i class="material-icons">fast_forward</i></span>';
	}
	mysqli_close($con);
	echo $output;
?>