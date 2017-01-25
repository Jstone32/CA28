<!DOCTYPE html> 
<html>
    <head  lang="en">
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="inventoryStyle.css">
        
        <?php
        //1. Change the arguments to match the connection to your local database
       // $connect = new mysqli("localhost","vahik","vahikjan94","vahik");
	   
        // $mysqli = new mysqli("localhost", "lamborghini", "ferrarif40", "lamborghini");
		
         $connect = new mysqli("localhost", "cs2610activity", "owl125", "cs2610activity");
        
        if($connect->connect_error) {
            die("<h2>Failed to connect to the database:<br/>$connect->connect_error</h2>");
         }
                      
    
         
     
         
         
        ?>
        
    </head>
    <body>
        <div class="mainContent">
        <form action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>" method="post" enctype="application/x-www-form-urlencoded" name="" > 
            
            <h2>Green Warehouse Inventory System</h2>
            <ul>
                <li><input type="submit" name="addItem" value="Add Item to Inventory" /></li>                
                <li><input type="submit" name="inWarehouse" value="Items in Warehouse" /></li>                
                <li><input type="submit" name="allItems" value="All In Stock" /></li>
            </ul>
  <?php 
  
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
            ?>
            <?php    
    
        if(isset($_POST['addItem'])){
           ?> 
		   
		   
           
            <h2>Add A New Item To Inventory</h2>
            <p><label for="partNo">Part Number</label><input id="partNo" type="text" name="partNo" /></p>
            <p><label for="description">Description</label><input id="description" type="text" name="description" /></p>
            <p><label for="category">Category</label>
               
            
           
			   
		
            </p>
			<p><label for="add"></label><input type="submit" id="add" name="add" value="Add Item" />
 <?php
		}
	
			
			
            if(isset($_POST["add"])){
			$partno=htmlentities($_POST["partNo"]);
			$description=htmlentities($_POST["description"]);
			$category=htmlentities($_POST["category"]);
			
			
			
          $result =$connect->query("INSERT INTO item VALUES($partno, '$description','$category')");
		  if($result==false)
		  {
		  echo "Did not add";
		  }
		 elseif($result==true)
		 {
			echo "Item added";
		 }
             
			 
			 
			 
			 
			 
			      ?> 
		   
		   
           
            <h2>Add A New Item To Inventory</h2>
            <p><label for="partNo">Part Number</label><input id="partNo" type="text" name="partNo" /></p>
            <p><label for="description">Description</label><input id="description" type="text" name="description" /></p>
            <p><label for="category">Category</label></p>
                <select id="category" name="category" />
                </select>
            </p>
            <p><label for="add"></label><input type="submit" id="add" name="add" value="Add Item" />
			   
		<?php
			 
			 
			 
			 
			 
			 
            } ?>
			
			
          <?php    
    
        if(isset($_POST['inWarehouse'])){
           ?>
            
            <h2>Select The Warehouse From the List Below<br/>And Click the List Parts Button</h2>
            <p><label for="warehouse">Warehouse</label>
                <select id="warehouse" name="warehouse" />
                </select>
            </p>            
            <p><label for="list"></label><input type="submit" id="list" name="list" value="List Parts" /></p>
            
			
			
			
			<?php
			}
            if(isset($_POST["add"])){
            $result=$connect->query("SELECT id, name FROM warehouse");
			?>
			<select id="category" name="category" />
			<?php
			while($row = $result->fetch_assoc()){
			echo "<option value='". $row['id']. "'>" .$row['name']. "</option>";
			}?>
			<!--<option value='field'>field</option>
			<option value='bundle'>bundle</option>
			<option value='software'>software</option>-->
			</select>
            <?php  
			}			
             ?>
			
			
            
    <?php    
    
        if(isset($_POST['allItems'])){
           ?>
            <h2>Inventory</h2>
            <table>
                <tr><th>Part Number</th><th>Description</th><th>Warehouse</th><th>Quantity</th></tr>
            </table>
           
            
            
        <?php       
            } ?>
        </form>
        </div>
    </body>
</html>
