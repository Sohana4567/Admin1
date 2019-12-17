<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Profile</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $cat = mysqli_real_escape_string($db->link,$_POST['cat']);
                    $Name = mysqli_real_escape_string($db->link,$_POST['Name']);
                    $About=mysqli_real_escape_string($db->link,$_POST['About']);
                    $Education=mysqli_real_escape_string($db->link,$_POST['Education']);
                    $Experience=mysqli_real_escape_string($db->link,$_POST['Experience']);
                    
                    $Certification=mysqli_real_escape_string($db->link,$_POST['Certification']);
                    $projects=mysqli_real_escape_string($db->link,$_POST['projects']);
                    $Skills=mysqli_real_escape_string($db->link,$_POST['Skills']);
                    $permitted=array('jpg','jpeg','png','gif');
                    $file_name=$_FILES['image']['name'];
                    $file_size=$_FILES['image']['size'];
                    $file_temp=$_FILES['image']['tmp_name'];
                    $div=explode('.',$file_name);
                    $file_ext=strtolower(end($div));
                    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                    $uploaded_image="upload/".$unique_image;
                    if($cat==""||$Name=="" ||$About=="" || $Education=="" || $Experience=="" || $Certification=="" || $projects==""|| $Skills==""){
                        echo "<span class='error'>Field must not be empty !</span>";
                    }elseif($file_size>1048567){
                        echo "<span class='error'>Image size must be less than 1MB !</span>";
                    }
                    elseif(in_array($file_ext,$permitted)==false){
                     echo "<span class='error'>You can upload only:-".implode(',',$permitted)."</span>";
                 }
                 else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query="INSERT INTO  `tbl_profile`(`Name`,`cat`,`About`,`Education`,`Experience`,`Certification`,`projects`,`Skills`,`image`) VALUES ('$Name','$cat','$About','$Education','$Experience','$Certification','$projects','$Skills','$uploaded_image')";
                        $inserted_rows=$db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success'>Details Inserted Successfully</span>";
                        }else{
                            echo "<span class='error'>Details not inserted!</span>";
                        }
                    }
                }
  
?>
<div class="block">               
                 <form action="addprofile.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                    <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                                    <?php
                                    $query="SELECT * FROM  `tbl_category`";
                                    $category=$db->select($query);
                                    if($category){
                                        while($result=$category->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['Caste'];?></option>
                                        <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="Name" placeholder="Enter Name..." class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>About</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="About"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Education</label>
                            </td>
                            <td>
                                <input type="text" name="Education" placeholder="Enter Education..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Experience</label>
                            </td>
                            <td>
                                <input type="text" name="Experience" placeholder="Enter Experience..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Certification </label>
                            </td>
                            <td>
                                <input type="text" name="Certification" placeholder="Enter Certification..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Projects</label>
                            </td>
                            <td>
                                <input type="text" name="projects" placeholder="Enter Projects..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Skills</label>
                            </td>
                            <td>
                                <input type="text" name="Skills" placeholder="Enter Name..." class="medium" />
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