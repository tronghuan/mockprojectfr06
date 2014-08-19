<div id="content">
    <style>

    </style>
    <div id="brand_search">
        <form action="" method="post">
            <input type="text" id="search" name="search" placeholder="Search brand here..." value="" size="30">
            <select name="type">
                <option value="0">Search by id</option>
                <option value="1" selected>Search by name</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Search" id="button">
            <br>
        </form>
        <?php
        if (isset($brand)) {
            echo "<table id='tblbran_search'>";
            echo "<tr>";
            echo "<td>Brand ID</td>";
            echo "<td>Brand Name</td>";
            echo "<td>Delete</td>";
            echo "</tr>";
            foreach ($brand as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value['brand_id'] . "</td>";
                echo "<td>" . $value['brand_name'] . "</td>";
                echo "<td><a href='delete/" . $value['brand_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else if (isset($not_found)) {
            echo "<h4>$not_found</h4>";
        } else if (isset($no_query)) {
            echo "<h4>$no_query</h4>";
        }
        ?>
</div>
</div>