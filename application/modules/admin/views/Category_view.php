<meta charset="utf-8">
<?php
    echo "<h1>Đây là danh sách category</h1>";


?>

<form>
       <table>
           <th>Category_name</th><th>Category parent</th><Th>Edit</Th>
           <?php foreach($category_list as $category){?>
            <tr><td><?php echo $category['category_name']?></td><td><?php echo $category['category_parentId'] ?> </td>
                <td><a href="edit"</td>
            </tr>
        <?php }?>
       </table>

</form>