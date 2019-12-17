<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Profile List</h2>
                <div class="block"> 
                <?php 
                //$id = (isset($_POST['id']) ? $_POST['id'] : '');
                $query="SELECT * FROM `tbl_profile`";
                $post = $db->select($query);
                if($post){
                    while ($result = $post->fetch_assoc()){
                    ?>
        
                    <div class="col-lg-4 col-md-6">
                    <img src="<?php  echo $result['image'];?>" alt="profile image" style="height:120px;width:120px"/>
                    <h2>Caste:</h2>
                    <p><?php echo $result['cat'];?></p><br/>
                    <h2>Name:</h2>
                    <p><?php echo $result['Name'];?></p><br/>
                    <h2>About:</h2>
                    <p><?php echo $result['About'];?></p><br/>
                    <h2>Education:</h2>
                    <p><?php echo $result['Education'];?></p><br/>
                    <h2>Experience:</h2>
                    <p><?php echo $result['Experience'];?></p><br/>
                    <h2>Certification:</h2>
                    <p><?php echo $result['Certification'];?></p><br/>
                    <h2>projects:</h2>
                    <p><?php echo $result['projects'];?></p><br/>
                    <h2>Skills:</h2>
                    <p><?php echo $result['Skills'];?></p><br/>
                    </div>
					<?php } } else { ?>  
						<h3>No Details Available in this category.</h3>
					<?php } ?>
                    <div id="disqus_thread"></div>
         <script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://login-8.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    


