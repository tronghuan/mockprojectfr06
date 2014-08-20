        <table border = '1'>
            <th>STT</th>
            <th><a href = '<?php echo base_url("administrator/bran/listbran/bran_id/$newSort/1") ?>'>ID</a>
                <?php if ($column == 'bran_id') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("administrator/bran/listbran/bran_name/$newSort/1") ?>'>Name</a>
                <?php if ($column == 'bran_name') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>

            <th>Edit</th>
            <th>Delete</th>
                <?php
                    if(isset($listbran) && ! empty($listbran)){
                        $iterator = 1;
                        foreach ($listbran as $list) {

                            $id = isset($list['bran_id']) ? $list['bran_id'] : "error";
                            $name = isset($list['bran_name']) ? $list['bran_name'] : "error";
                            echo "<tr>";
                                echo "<td>" . $iterator++ . "</td>";
                                echo "<td>" . $id . "</td>";
                                echo "<td>" . $name . "</td>";
                                echo "<td>" . "<a href = '" . base_url("administrator/bran/update") . "/" . $id . "'>Edit</a>". "</td>";
                                echo "<td>" . "<a href = '" . base_url("administrator/bran/delete") . "/" . $id . "'>Delete</a>". "</td>";
                            echo "</tr>";
                        } // end foreach $listbran
                    }
                    
                ?>
        </table>
