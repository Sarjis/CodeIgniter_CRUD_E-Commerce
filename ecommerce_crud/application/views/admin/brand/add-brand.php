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
                    <form action="<?php echo base_url('brand/save') ?>" method="POST" class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="brand_name" class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Brand Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="brand_description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Publication status</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" name="publication_status" value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-3 pull-right">
                                <input type="submit" name="btn" value="Save Brand Info"
                                       class="btn btn-danger btn-block"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
