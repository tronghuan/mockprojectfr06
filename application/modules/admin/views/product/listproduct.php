<div id="content">
    <table id="list-product">
        <thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Date</td>
            <td>Desc</td>
            <td>Price</td>
            <td>Sale</td>
            <td>Brand</td>
            <td>Country</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($results as $listPro){ ?>
        <tr>
            <td><img src="<?php echo base_url(); ?>public/images/product/<?php echo $listPro['image_name']; ?>" width="50" height="50" ></td>
            <td><?php echo $listPro['product_name'] ?></td>
            <td><?php echo $listPro['product_date'] ?></td>
            <td><?php echo $listPro['product_desc'] ?></td>
            <td><?php echo $listPro['product_price'] ?></td>
            <td><?php echo $listPro['product_sale'] ?></td>
            <td><?php echo $listPro['brand_name'] ?></td>
            <td><?php echo $listPro['country_name'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <p><?php echo $links; ?></p>
</div>