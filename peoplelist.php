<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2 style="center">People List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th width="10%">No</th>
						    <th width="10%">Top 50 people</th>
							<th width="10%">Top 100 people</th>
							<th width="10%">All</th>
                            </tr>
					</thead>
                    <tbody>
					<?php
                      $query="SELECT * FROM `tbl_people`";
                      $people=$db->select($query);
                      if($people){
                           $i=0;
                          while($result=$people->fetch_assoc()){
                            $i++;
                      ?>
                       <tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
                            <td><a href="profilelist.php?profileid=<?php echo $result['id'];?>"><?php echo $result['people50']; ?></a></td>
                            <td><a href="profilelist.php?profileid=<?php echo $result['id'];?>"><?php echo $result['people100']; ?></a></td>
                            <td><a href="profilelist.php?profileid=<?php echo $result['id'];?>"><?php echo $result['All']; ?></a></td>
                            </tr>
						   <?php } } ?>	
					</tbody>
				</table>
	
               </div>
            </div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				setupLeftMenu();
				$('.datatable').dataTable();
				setSidebarHeight();
			});
		</script>