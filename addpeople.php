<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New People</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $people50=mysqli_real_escape_string($db->link,$_POST['people50']);
                    $people100=mysqli_real_escape_string($db->link,$_POST['people100']);
                    $All=mysqli_real_escape_string($db->link,$_POST['All']);
                    if($people50==""||$people100==""||$All==""){
                        echo "<span class='error'>Field must not be empty !</span>";
                    }
                    $query="INSERT INTO `tbl_people`(`people50`,`people100`,`All`) VALUES ('$people50',' $people100','$All')";
                        $inserted_rows=$db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success'>People  Inserted Successfully</span>";
                        }else{
                            echo "<span class='error'>People not inserted!</span>";
                        }
                    }
                
            
?>
 <div class="block">               
                 <form action="addpeople.php" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>50 People</label>
                            </td>
                            <td>
                                <input type="text" name="people50" placeholder="Enter People..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>100 People</label>
                            </td>
                            <td>
                                <input type="text" name="people100" placeholder="Enter People..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>All People</label>
                            </td>
                            <td>
                                <input type="text" name="All" placeholder="Enter People..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>

                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>