<?php require 'classes/connect.class.php';
$current_note=[
 'id'=>'',
 'title'=> '',
 'description'=> '',
];
$connect=new Connect();
$notes=$connect->get_notes();
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['id'])){
    $id = $_POST['id'];
    $note = $connect->get_note_by_id($id);
    if($note){
        $current_note['id'] = $id;
        $current_note['title'] = $note[0]['title'];
        $current_note['description'] = $note[0]['description'];
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   

    <title>NOTES_APP</title>
</head>
<body>
    <div class="container w-50 mt-5">
        <div class="card mt-10">
            <div class="card-header bg-light">
                <h3 class="text-center">NOTES APP</h3>
            </div>
            <div class="card-body form-group">
                <form action="add.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $current_note['id'] ?>">
                    <input class="form-control" type="text" name="title" placeholder="Enter your Note Title" style=" height:38px;margin-top:2px" value="<?php echo $current_note['title']?>">
                    <textarea class="form-control" type="text" name="des" placeholder="Enter your Note Description" style=" margin-top:10px;display:block"><?php echo $current_note['description']?></textarea>
                    <button  class="btn btn-secondary form-control mt-5"><?php if($current_note['id']):?>
                        Update Note
                    <?php else:?>
                        Add Note</button>
                    <?php endif;?>
                </form>
        </div>
        <?php foreach($notes as $note): ?>
        <div class="card mt-10">
            <div class="card-body form-group">
                    <div class="container mt-2 d-flex justify-content-between">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                            <button class="btn btn-link"><?php echo $note['title'] ?></button>
                        </form>
                       
                        <p ><?php echo $note['description'] ?></p>
                        <p ><?php echo $note['note_date'] ?></p>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="delete" value="<?php echo $note['id']?>">
                            <button class="btn btn-danger close">x</button>
                        </form>
                        
                        
                    </div>
           
               

            </div>

        </div>
        <?php endforeach;?>
    </div>


</body>
</html>