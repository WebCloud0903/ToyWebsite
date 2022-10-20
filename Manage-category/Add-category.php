<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>

    <style>

    body{
        background: url('../Image/9Headu-Web.jpg');
    }
    .add-info{
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }
    .cover{
        background: rgba(0, 0, 0, 0.8);
        box-shadow: 2px 2px 17px 10px rgb(255 255 255 / 80%);
        width: 220px;
        height: 190px;
    }
    .form-add{
        margin-top: 20px;
    }
    label{
        color: white;
        margin-left: 20px;
    }
    input{
        margin-left: 20px;
    }
    .btn{
        margin-left: 60px;
        width: 100px;
    }
    select{
            margin-left: 20px;
        }

    </style>
</head>
<body>
    <?php
        include_once("../connection.php");
    ?>

    <?php
        if(isset($_POST['add'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
        


            if($name == ""){echo "<li style='color: white'>Enter the name of category, please!</li>";}

            if($description == ""){echo "<li style='color: white'>Enter description of the category, please!</li>";}



            if($name != "" && $description != ""){
                $sql = "Insert into public.category(name, description) 
                values('$name', '$description')";
                $qr = pg_query($conn, $sql);
                header("location: category-management.php");
            }
            
        }
    ?>


   <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-add">
                <div><label>Name</label></div><input type="text" name="name"/><br><br>
                <div><label>Description</label></div><input type="text" name="description"/><br><br>

                <button type="submit" class="btn btn-primary" name="add">Add</button>
            </form>
       </div>
   </div>
</body>
</html>
