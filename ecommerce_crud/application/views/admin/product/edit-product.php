<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h3 class="text-center text-success">
                    <?php $message = $this->session->userdata('message');
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    }
                    ?> </h3>
                <div class="panel-body">
                    <form action="<?php echo base_url('product/update') ?>" method="POST" class="form-horizontal"
                          enctype="multipart/form-data" name="editProductForm">

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger text-right">Category Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="category_id">
                                    <option>--Select Category Name--</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Brand Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="brand_id">
                                    <option>--Select Brand Name--</option>
                                    <?php foreach ($brands as $brand) { ?>
                                        <option value="<?php echo $brand->id ?>"><?php echo $brand->brand_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" value="<?php echo $productById->product_name; ?>" name="product_name" class="form-control" required />
                                <input type="hidden" value="<?php echo $productById->id; ?>" name="id" class="form-control"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Product Price</label>
                            <div class="col-md-8">
                                <input type="number" value="<?php echo $productById->product_price; ?>"
                                       name="product_price" class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Product Quantity</label>
                            <div class="col-md-8">
                                <input type="number" value="<?php echo $productById->product_quantity; ?>"
                                       name="product_quantity" class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Short Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="short_description"
                                          required><?php echo $productById->short_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Long Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="editor" name="long_description"
                                          required><?php echo $productById->long_description; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Product Image</label>
                            <div class="col-md-4">
                                <input type="file" name="product_image" accept="image/*"/>
                            </div>
                            <div class="col-md-4">
                                <img src="<?php echo base_url($productById->product_image); ?>">
                                <input type="hidden" value="<?php echo $productById->product_image; ?>" name="product_image_old" accept="image/*"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Publication status</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" name="publication_status" value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger">Top Product</label>
                            <div class="col-md-8">
                                <?php if ($productById->top_product == 1){ ?>
                                    <input type="checkbox" checked  name="top_product"/>
                                <?php }else{ ?>
                                <input  type="checkbox" name="top_product" />
                                <?php }?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 bg-danger"></label>
                            <div class="col-md-8">
                                <input type="submit" name="btn" value="Update Product Info"
                                       class="btn btn-danger btn-outline-light btn-block text-lg-center"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['editProductForm'].elements['category_id'].value = '<?php echo $productById->category_id;?>';
    document.forms['editProductForm'].elements['brand_id'].value = '<?php echo $productById->brand_id;?>';
    document.forms['editProductForm'].elements['publication_status'].value = '<?php echo $productById->publication_status;?>';
</script>


