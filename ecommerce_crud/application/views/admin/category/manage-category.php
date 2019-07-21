<div id="page-wrapper">
    <h3 class="text-center text-success">
        <?php $message = $this->session->userdata('message');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?> </h3>


    <div class="container">
        <div class="row">
            <input type="button" id="addBrandBtn" value="Add Brand" class="btn btn-info">
            <div id="addBrandModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="updateBrandForm" class="form-horizontal" action="">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Brand Name</label>
                                    <div class="col-md-9">
                                        <input id="brand_name" type="text" name="brand_name" class="form-control">
                                        <input id="employee_id" type="hidden" name="id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Brand Description</label>
                                    <div class="col-md-9">
                                        <textarea id="brand" name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="btnSave" type="button" class="btn btn-primary">Add Employee</button>
                        </div>
                    </div>
                </div>
            </div>
           <form id="viewCategoryForm" action="">
               <table class="table table-bordered table-hover">
                   <thead id="tableHead">
                   <tr class="bg-primary">
                       <th>SL No.</th>
                       <th>Category Name</th>
                       <th>Category Description</th>
                       <th>Publication Status</th>
                       <th>Action</th>
                   </tr>
                   </thead>
                   <tbody id="showCategory">

                   </tbody>

               </table>
           </form>
        </div>
    </div>

</div>
<script src="<?php echo base_url('asset/admin/js/jquery.js') ?>">

</script>
<script>
    $(document).ready(function () {

        showAllEmployee();

        function showAllEmployee() {
            $('#viewCategoryForm').attr('action', "<?php echo base_url()?>show/category");
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: $('#viewCategoryForm').attr('action'),
                async: false,
                dataType: 'json',
                success: function (data) {
                    let html = '';
                    for (let i = 0; i < data.length; i++) {

                        html += '<tr>' +
                            '<td>' + data[i].id + '</td>' +
                            '<td>' + data[i].category_name + '</td>' +
                            '<td>' + data[i].category_description + '</td>' +
                            '<td>' + data[i].publication_status + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-block btn-info item-edit" data="' + data[i].id + '">Edit</a>' +
                            '<a href="javascript:;" class="btn btn-block btn-danger item-delete" data="' + data[i].id + '">Delete</a>' +
                            '</td>' +

                            '</tr>';
                    }
                    $('#showCategory').html(html);
                },
                error: function () {
                    alert("Data couldn't get from Database");
                }
            });
        }


        $('#addBrandBtn').click(function () {
            $('#addBrandModal').modal('show');
        });
        $('#tableHead').click(function () {
            $('#viewCategory').toggle(1000);
        });
    });
</script>

<!---->
<?php //$i = 1;
//foreach ($categories as $category) {
//    ?>
<!--    <tr>-->
<!--        <td>--><?php //echo $i++; ?><!--</td>-->
<!--        <td>--><?php //echo $category->category_name ?><!--</td>-->
<!--        <td>--><?php //echo $category->category_description ?><!--</td>-->
<!--        <td>--><?php //echo $category->publication_status ? 'Published' : 'Un-Published'; ?><!--</td>-->
<!---->
<!--        <td>-->
<!--            --><?php //if ($category->publication_status == 1) { ?>
<!---->
<!--                <a href="--><?php //echo base_url("category/publish/$category->id") ?><!--" class="btn btn-info btn-xs"-->
<!--                   title="Published">-->
<!--                    <span class="glyphicon glyphicon-arrow-up"></span>-->
<!--                </a>-->
<!--            --><?php //} else { ?>
<!---->
<!--                <a href="--><?php //echo base_url("category/un-publish/$category->id") ?><!--"-->
<!--                   class="btn btn-warning btn-xs"-->
<!--                   title="Un-Published">-->
<!--                    <span class="glyphicon glyphicon-arrow-down"></span>-->
<!--                </a>-->
<!--            --><?php //} ?>
<!--            <a href="--><?php //echo base_url("category/edit/$category->id") ?><!--" class="btn btn-success btn-xs">-->
<!--                <span class="glyphicon glyphicon-edit"></span>-->
<!--            </a>-->
<!--            <a href="--><?php //echo base_url("category/delete/$category->id") ?><!--" class="btn btn-danger btn-xs"-->
<!--               onclick="return confirm('Are you sure?')">-->
<!--                <span class="glyphicon glyphicon-trash"></span>-->
<!--            </a>-->
<!--        </td>-->
<!--    </tr>-->
<!--    @--><?php //} ?>