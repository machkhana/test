<?php
    if(!isset($_SESSION['id'])){ include('login.php'); }
?>
<div class="container">
    <div class="text-right mt-2">
        <button id="add" class="btn btn-sm btn-success">დამატება</button>
        <a class="btn btn-sm btn-success" href="logout.php">გამოსვლა</a>
    </div>
    <div class="row mt-3 infosideform">
        <div class="col-sm-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input name="title" class="form-control" id="title" type="text" placeholder="სათაური" required>
                </div>
                <div class="form-group">
                    <textarea name="text" class="form-control" id="text" placeholder="ტექსტი" required></textarea>
                </div>
                <div class="input_div imageside">
                    <input name="file" type="file" class="form-control">
                </div>
                <div class="form-group col-sm-12 mt-1">
                    <button type="submit" class="btn btn-success btn-sm" name="addinfo" id="addbutton">დამატება</button>
                    <button type="submit" class="btn btn-success btn-sm" name="editinfo" id="editbutton">ცვლიელბა</button>
                    <button type="button" class="btn btn-success btn-sm" id="close">X</button>
                </div>
            </form>
            <?=$message;?>
        </div>
    </div>
    <div class="full-div mt-3">
        <table class="table">
            <tbody>
                <?php
                    foreach ($info->index() as $infos){
                ?>
                <tr id="infoid-<?=$infos['id'];?>">
                    <td width="120"><img src="images/<?=$infos['image'];?>" width="120"/></td>
                    <td width="200"><?=$infos['title'];?></td>
                    <td><?=$infos['text'];?></td>
                    <td width="200">
                        <button data-id="<?=$infos['id'];?>" data-title="<?=$infos['title'];?>" data-text="<?=$infos['text'];?>" data-image="<?=$infos['image'];?>" class="btn btn-sm btn-primary edit" >ცვლილება</button>
                        <button id="<?=$infos['id'];?>" class="btn btn-sm btn-danger removeinfo">წაშლა</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

