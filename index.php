<?php
    //include database
    include 'admin/Database/connection.php';
    session_start();
?>
<!doctype html>
<html lang="en">

    <head>
    <?php include 'admin/includes/header.php'; ?>
    </head>

    
    <body data-layout="horizontal" data-layout-mode="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <?php include 'admin/includes/topbar.php'; ?>


            <!-- ======================== -->
            <!-- Start right Content here -->
            <!-- ======================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="py-3 px-4 d-sm-flex align-items-center justify-content-between mb-1">
                                        <a href="#" data-id="" data-toggle="modal" data-target="#addItemModal" class="btn btn-primary waves-effect waves-light">
                                            <i class="bx bx-plus font-size-16 align-middle me-2"></i> Add an Item
                                        </a>
                                    
                                        <h4 class="card-title mb-0">Inventory</h4>
                                        
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div id="itemsTable"></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                        

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Footer Start -->
                <?php include 'admin/includes/footer.php'; ?>
            </div>
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
    // Initialize Grid.js
    
    new gridjs.Grid({
  columns: [
    { name: 'Item ID' },
    { name: 'Name' },
    { name: 'Description' },
    { name: 'Location' },
    { name: 'Category' },
    { name: 'Quality' },
    { name: 'Price' },
    { name: 'Quantity' },
    {
      name: 'Actions',
      formatter: (cell, row) => {
        const itemId = row.cells[0].data;  // Assuming item_id is in the first column
        const itemName = row.cells[1].data; // Assuming item_name is in the second column

        // Log to ensure the formatter is being triggered
        console.log('Rendering actions for:', itemId, itemName);

        // Create a div container for the buttons
        const container = document.createElement('div');
        
        // Create the "Edit" button
        const editButton = document.createElement('button');
        editButton.className = 'py-2 mb-4 px-4 border rounded-md text-white bg-blue-600';
        editButton.textContent = 'Edit';
        editButton.onclick = () => {
          alert(`Editing "${itemName}" with ID: ${itemId}`);
          // Replace with your edit logic
        };
        
        // Create the "Delete" button
        const deleteButton = document.createElement('button');
        deleteButton.className = 'py-2 mb-4 px-4 border rounded-md text-white bg-red-600 ml-2';
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = () => {
          alert(`Deleting "${itemName}" with ID: ${itemId}`);
          // Replace with your delete logic
        };
        
        // Append buttons to the container
        container.appendChild(editButton);
        container.appendChild(deleteButton);

        return container;  // Return the div containing the buttons
      }
    }
  ],
  server: {
    url: 'admin/includes/fetchdata/itemsfetch.php',
    then: data => {
      // Log the data received to ensure it's correct
      console.log('Data received:', data);
      return data.data.map(item => [
        item.item_id,
        item.item_name,
        item.item_description,
        item.item_location,
        item.item_category,
        item.item_quality,
        item.item_price,
        item.item_quantity,
        null
      ]);
    }
  },
  pagination: {
    enabled: true,
    limit: 10
  },
  search: true,
  render: {
    html: true  // Ensure HTML is rendered correctly
  }
}).render(document.getElementById('itemsTable'));


</script>