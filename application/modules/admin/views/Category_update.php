<?php foreach ($single_category as $category); ?>
<meta charset="utf-8">
<?php echo form_error('txt_category'); ?>
<form action = "" method="POST" name="fr_category">
    <label>Name Category</label>
    <input type="text" name="txt_category" value="<?php echo set_value('txt_category'); ?><?php echo $category['category_name'];?>"/>

    <label>Category Parent</label><select name="Parent">
                <?php
                 if($category['category_parentId'] == '0' ||$category['category_parentId']=== NULL ){
                    echo '<option value="0" selected>-- No parent -- </option>';
                 }
                ?>
        <?php foreach($all_category as $parent){
                if($parent['category_id'] == $category['category_parentId']){
                    echo '<option value="'.$parent['category_id'].'" selected>'.$parent['category_name'].'</option>';
                    echo '<option value ="0">-- No parent --</option>';
                }
                else
                {
                echo '<option value="'.$parent['category_id'].'">'.$parent['category_name'].'</option>';
                }
        }
            ?>

        <?php ; ?>
    </select>
    <input type="submit" name="submit" value="update"/>
</form>
