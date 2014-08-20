<div id = 'center'>
    <h2>Danh sách user</h2>
    <a  href='<?php echo base_url("admin/user/insertuser");?>'>
        <button >Thêm User</button>
    </a>
            
    <?php
        if(isset($link) && $link != ''){
            echo "Trang: " . $link;
        }
    ?>
        <table border = 1 id = 'listuser'>
            <?php
                // print_r($column);
                // echo $_SESSION['per_page'];
                // echo $_SESSION['show_all'];
                if ($sortType == 'asc'){
                    $newSort = 'desc';
                    $imageName = "up-arrow-sort.png";
                }else{
                    $newSort = 'asc';
                    $imageName = "down-arrow-sort.png";
                }
            ?>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_id/$newSort/1") ?>'>ID</a>
                <?php if ($column == 'usr_id') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_name/$newSort/1") ?>'>Name</a>
                <?php if ($column == 'usr_name') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_password/$newSort/1") ?>'>Password</a>
                <?php if ($column == 'usr_password') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_email/$newSort/1") ?>'>Email</a>
                <?php if ($column == 'usr_email') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_address/$newSort/1") ?>'>Address</a>
                <?php if ($column == 'usr_address') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_phone/$newSort/1") ?>'>Phone</a>
                <?php if ($column == 'usr_phone') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_gender/$newSort/1") ?>'>Gender</a>
                <?php if ($column == 'usr_gender') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("admin/user/listuser/usr_level/$newSort/1") ?>'>Level</a>
                <?php if ($column == 'usr_level') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th>Edit</th>
            <th>Delete</th>
            <?php
                foreach ($listuser as $list) {

                    # code...
                    echo "<tr>";
                        echo "<td>" . $list['usr_id'] . "</td>";
                        echo "<td>" . $list['usr_name'] . "</td>";
                        echo "<td>" . $list['usr_password'] . "</td>";
                        echo "<td>" . $list['usr_email'] . "</td>";
                        echo "<td>" . $list['usr_address'] . "</td>";
                        echo "<td>" . $list['usr_phone'] . "</td>";
                        echo "<td>" . $list['usr_gender'] . "</td>";
                        echo "<td>" . $list['usr_level'] . "</td>";
                        echo "<td>" . "<a href = '" . base_url("admin/user/update") . "/" . $list['usr_id'] . "'>Edit</a>". "</td>";
                        /*echo "<td>" . "<a href = '" . base_url("admin/user/delete") . "/" . $list['usr_id']
                         ."' onclick='if(CheckDelete() == false) return false' " . "'>Delete</a>". "</td>";*/
                        echo "<td>" . "<a href = '" . base_url("admin/user/delete") . "/" . $list['usr_id']
                        ."' onclick='if(CheckDelete() == false) return false'>Delete</a></td>";
                        
                    echo "</tr>";

                } // end foreach $listuser
            ?>
        </table>
    </div>
    
    
