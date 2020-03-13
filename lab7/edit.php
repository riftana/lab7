<?php
// including the database connection file
include_once("db.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];

    $name = $_POST['name'];
    $des = $_POST['description'];
    $quantity = $_POST['quantity'];
          
    
    if(empty($id) ||empty($name) || empty($des) || empty($quantity)) { 
if(empty($id)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($des)) {
            echo "<font color='red'>description field is empty.</font><br/>";
        }
        
        if(empty($quantity)) {
            echo "<font color='red'>qauntity field is empty.</font><br/>";
        }  
         echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        exit();
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name',des='$des',quantity='$quantity' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: home.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $des = $res['des'];
    $quantity = $res['quantity'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>description</td>
                <td><input type="text" name="description" value="<?php echo $des;?>"></td>
            </tr>
            <tr> 
                <td>quantity</td>
                <td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>