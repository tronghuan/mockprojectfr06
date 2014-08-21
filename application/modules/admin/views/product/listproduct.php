<div id="content">
    <table id="list-product">
        <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Date</td>
            <td>Desc</td>
            <td>Image</td>
            <td>Price</td>
            <td>Sale</td>
            <td>BrandId</td>
            <td>Country</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($results as $listPro){ ?>
        <tr>
            <td><?php echo $listPro['product_id'] ?></td>
            <td><?php echo $listPro['product_name'] ?></td>
            <td><?php echo $listPro['product_date'] ?></td>
            <td><?php echo $listPro['product_desc'] ?></td>
            <td><?php echo $listPro['product_mainImageId'] ?></td>
            <td><?php echo $listPro['product_price'] ?></td>
            <td><?php echo $listPro['product_sale'] ?></td>
            <td><?php echo $listPro['brand_id'] ?></td>
            <td><?php echo $listPro['product_country'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <p><?php echo $links; ?></p>
</div>