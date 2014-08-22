<style type="text/css">
    #list-product td{
        padding: 10px;
    }
    #pagination a{
            display: inline-block;
            width: 35px;
            background-color: #7ea;
            margin-left: 5px;
            text-align: center;
            border-radius: 3px;
            text-decoration: none;
  
        }
    #pagination strong{
        display: inline-block;
            width: 35px;
            margin-left: 5px;
            background-color: #acb;
            text-align: center;
            border-radius: 3px; 
    }
</style>
<div id="content">
    <table id="list-product" border="1" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Date</td>
            <td>Desc</td>
            <td>Price</td>
            <td>Sale</td>
            <td>BrandId</td>
            <td>Country</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($results as $listPro){ ?>
        <tr>
            <td><img src="<?php echo base_url()."public/images/product/".$listPro['image'] ?>" width="80" height="80"></td>
            <td><?php echo $listPro['product_name'] ?></td>
            <td><?php echo $listPro['product_date'] ?></td>
            <td><?php echo $listPro['product_desc'] ?></td>
            <td><?php echo "$".$listPro['product_price'] ?></td>
            <td><?php echo $listPro['product_sale']."%" ?></td>
            <td><?php echo $listPro['brand'] ?></td>
            <td><?php echo $listPro['country'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    
    <div id="pagination"><?php echo $links; ?></div>
</div>