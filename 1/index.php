<?php
    //include database
    include 'admin/Database/connection.php';
    session_start();
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
    <?php include 'admin/includes/header.php'; ?>
    </head>

    
    <body>  

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <?php include 'admin/includes/topbar.php'; ?>


            <!-- ======================== -->
            <!-- Start right Content here -->
            <!-- ======================== -->
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="py-3 px-4 d-sm-flex align-items-center justify-content-between mb-1">
                                    <a href="#" data-id="" data-bs-toggle="modal" data-bs-target="#addItemModal" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bx-plus font-size-16 align-middle me-2"></i> Add an Item
                                    </a>
                                    <h4 class="card-title mb-0">Inventory</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped display compact text-gray-900" id="itemsTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th style="display:none;">Item ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Location</th>
                                                    <th>Category</th>
                                                    <th>Quality</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- End Page-content -->

                <!-- Footer Start -->
                <?php include 'admin/includes/footer.php'; ?>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- footer -->
        <?php include 'admin/includes/scripts.php'; ?>
        <!-- modal -->
        <?php include 'admin/includes/modals/itemsmodal.php'; ?>
    </body>
</html>
<script type="text/javascript">
    // Fetch data from the server for data table
    $(document).ready(function() {
        $('#itemsTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 'All']],
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[1]); // Use item_id for row ID
            },
            'serverSide': true,
            'processing': true,
            'paging': true,
            'ordering': false,
            // 'order': [],
            'ajax': {
                'url': 'admin/includes/fetchdata/itemsfetch.php',
                'type': 'post',
            },
            "columnDefs": [
                // { 'targets': [0], 'orderable': false }, // Disable ordering for specific columns
                { 'targets': [1], 'visible': false },      // Hide the item_id column
            ],
            'columns': [
                { data: 0 }, // Action buttons
                { data: 1 }, // Hidden item_id
                { data: 2 }, // Name
                { data: 3 }, // Description
                { data: 4 }, // Location
                { data: 5 }, // Category
                { data: 6 }, // Quality
                { data: 7 }, // Price
                { data: 8 }  // Quantity
            ]
        });
    });

    // Add item with validation
    $(document).on('submit','#addItem',function(e){
            e.preventDefault();
            var item_name = $('#item_name').val();
            var item_description = $('#item_description').val();
            var item_location = $('#item_location').val();
            var item_category = $('#item_category').val();
            var item_quality = $('#item_quality').val();
            var item_price = $('#item_price').val();
            var item_quantity = $('#item_quantity').val();

            if(item_name != '' && item_description != '' && item_location != '' && item_category != '' && item_quality != '' && item_price != '' && item_quantity != ''){
                $.ajax({
                    url:"admin/includes/codes/itemscode.php",
                    type:"post",
                    data:
                    {
                        item_name:item_name,
                        item_description:item_description,
                        item_location:item_location,
                        item_category:item_category,
                        item_quality:item_quality,
                        item_price:item_price,
                        item_quantity:item_quantity,
                        add: true
                    },
                    success:function(data){
                        var json = JSON.parse(data);
                        var addItemStatus = json.addItemStatus;
                        if(addItemStatus == 'true'){
                            mytable =$('#itemsTable').DataTable();
                            mytable.draw();
                            $('#addItemModal').modal('hide');
                            $('#addItem')[0].reset();
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(json.message);
                        }else{
                            alert('failed');
                        }
                    }
                });
            } else {
                alert('Fill all the required fields');
            }
    });

    // View item
    $('#itemsTable').on('click', '.edititembtn', function(event) {
        var table = $('#itemsTable').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        $('#editItemModal').modal('show');

        $.ajax({
        url:"admin/includes/codes/itemscode.php",
        data: {
            id: id,
            view: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_item_name').val(json.item_name);
            $('#_item_description').val(json.item_description);
            $('#_item_location').val(json.item_location);
            $('#_item_category').val(json.item_category);
            $('#_item_quality').val(json.item_quality);
            $('#_item_price').val(json.item_price);
            $('#_item_quantity').val(json.item_quantity);

            $('#id').val(id);
            $('#trid').val(trid);
        }
        })
    });















    //view school for delete modal
    $('#itemsTable').on('click', '.deleteitembtn', function(event) {
        var table = $('#itemsTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#deleteitemsModal').modal('show');

        $.ajax({
        url:"admin/includes/codes/itemscode.php",
        data: {
            id: id,
            deleteview: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);
            $('#_id_').val(id);
            $('#_trid_').val(trid);
        }
        })
    });
</script>