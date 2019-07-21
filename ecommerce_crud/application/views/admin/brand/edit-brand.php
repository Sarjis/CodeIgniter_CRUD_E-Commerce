<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h3 class="text-center text-success">
                    <?php  $message = $this->session->userdata('message');
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    }
                    ?> </h3>
                <div class="panel-body">
                    <form name="editBrandForm" action="<?php echo base_url('brand/update') ?>" method="POST" class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Name</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo $brand->brand_name;?>" name="brand_name" class="form-control" required/>
                                <input type="hidden" value="<?php echo $brand->id;?>" name="id" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="brand_description" required><?php echo $brand->brand_description;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Publication status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" value="Update Brand Info"
                                       class="btn btn-success btn-block"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['editBrandForm'].elements['publication_status'].value =<?php echo $brand->publication_status;?>
</script>