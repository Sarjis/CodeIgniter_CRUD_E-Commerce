<div id="page-wrapper">
    <h3 class="text-center text-success">
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?> </h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr class="bg-primary">
                <th>SL No.</th>
                <th>Category Name</th>
                <th>Brand Name</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Top Product</th>
                <th>Product Image</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            foreach ($category_products as $product) {
                ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $product->category_name; ?></td>
                    <td><?php echo $product->brand_name; ?></td>
                    <td><?php echo $product->product_name; ?></td>
                    <td><?php echo $product->product_price; ?></td>
                    <td><?php echo $product->product_quantity; ?></td>
                    <td><?php echo $product->top_product; ?></td>
                    <td><img src="<?php echo base_url($product->product_image); ?>" alt="" width="50px" height="50px">
                    </td>
                    <td><?php echo $product->publication_status == 1 ? 'Published' : 'Un-Published'; ?></td>

                    <td>

                        <a href="<?php echo base_url('product/manage')?>" class="btn btn-info btn-xs"
                           title="Details">
                            <span class="glyphicon glyphicon-zoom-out"></span>
                        </a>
                        <?php if ($product->publication_status == 1) { ?>
                            <a href="<?php echo base_url("product/publish/$product->id")?>" class="btn btn-info btn-xs"
                               title="Published">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo base_url("product/un-publish/$product->id")?>"
                               class="btn btn-warning btn-xs"
                               title="Un-Published">
                                <span class="glyphicon glyphicon-arrow-down"></span>
                            </a>
                        <?php } ?>
                        <a href="<?php echo base_url("product/edit/$product->id")?>" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="<?php echo base_url("product/delete/$product->id")?>" class="btn btn-danger btn-xs"
                           onclick="return confirm('Are you sure to delete Product from Database?')">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>



