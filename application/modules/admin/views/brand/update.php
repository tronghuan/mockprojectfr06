<?php foreach ($single_brand as $brand): ?>

<form method="POST">
       <label>Brand name:</label><input type="text" name="txt_name" value="<?php $brand[brand_name] ?>"/>
        <label>Describe:</label><textarea name="txt_des" value="<?php $brand[brand_desc] ?>"></textarea>
            <input type="submit" name="submit" value="Update">
</form>