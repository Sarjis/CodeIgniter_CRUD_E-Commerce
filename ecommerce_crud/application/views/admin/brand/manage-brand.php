<div id="page-wrapper">
    <h3 class="text-center text-success">
        <?php $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?> </h3>
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="bg-primary">
            <th>SL No.</th>
            <th>brand Name</th>
            <th>brand Description</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="viewBrand">


        </tbody>
    </table>
</div>
<script src=""></script>

<?php //$i = 1;
//foreach ($brands as $brand) {
//    ?>
<!--    <tr>-->
<!--        <td>--><?php //echo $i++; ?><!--</td>-->
<!--        <td>--><?php //echo $brand->brand_name ?><!--</td>-->
<!--        <td>--><?php //echo $brand->brand_description ?><!--</td>-->
<!--        <td>--><?php //echo $brand->publication_status ? 'Published' : 'Un-Published'; ?><!--</td>-->
<!---->
<!--        <td>-->
<!--            --><?php //if ($brand->publication_status == 1) { ?>
<!---->
<!--                <a href="--><?php //echo base_url("brand/publish/$brand->id") ?><!--" class="btn btn-info btn-xs"-->
<!--                   title="Published">-->
<!--                    <span class="glyphicon glyphicon-thumbs-up"></span>-->
<!--                </a>-->
<!--            --><?php //} else { ?>
<!---->
<!--                <a href="--><?php //echo base_url("brand/un-publish/$brand->id") ?><!--" class="btn btn-warning btn-xs"-->
<!--                   title="Un-Published">-->
<!--                    <span class="glyphicon glyphicon-thumbs-down"></span>-->
<!--                </a>-->
<!--            --><?php //} ?>
<!--            <a href="--><?php //echo base_url("brand/edit/$brand->id") ?><!--" class="btn btn-success btn-xs">-->
<!--                <span class="glyphicon glyphicon-edit"></span>-->
<!--            </a>-->
<!--            <a href="--><?php //echo base_url("brand/delete/$brand->id") ?><!--" class="btn btn-danger btn-xs"-->
<!--               onclick="return confirm('Are you sure?')">-->
<!--                <span class="glyphicon glyphicon-trash"></span>-->
<!--            </a>-->
<!--        </td>-->
<!--    </tr>-->
<!--    @--><?php //} ?>