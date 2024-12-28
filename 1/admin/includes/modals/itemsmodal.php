<!-- Add Item Modal class="modal fade d-block" -->
<div class="modal fade modal-sheet p-4 py-md-5" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Add item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 text-center">
                <form id="addItem" action="">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_description" class="form-label">Item Description</label>
                                <input type="text" class="form-control" id="item_description" name="item_description" required>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_price" class="form-label">Item Price</label>
                                <input type="text" class="form-control" id="item_price" name="item_price" required>
                                <div id="item_price_error" class="invalid-feedback">Please enter a valid price (e.g., 123.45).</div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_category" class="form-label">Item Category</label>
                                <input type="text" class="form-control" id="item_category" name="item_category" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_quality" class="form-label">Item Quality</label>
                                <select class="form-select" id="item_quality" name="item_quality" required>
                                    <option disabled selected hidden> <-- SELECT --> </option>
                                    <option value="Best"> Best </option>
                                    <option value="Good"> Good </option>
                                    <option value="Damaged"> Damaged </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_quantity" class="form-label">Item Quantity</label>
                                <input type="text" class="form-control" id="item_quantity" name="item_quantity" required>
                                <div id="item_quantity_error" class="invalid-feedback">Please enter a valid quantity (positive integer only).</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="item_location" class="form-label">Item Location</label>
                                <input type="text" class="form-control" id="item_location" name="item_location" required>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_image" class="form-label">Item Image</label>
                                <input type="file" class="form-control" id="item_image" name="item_image" required>
                                <div class="invalid-feedback">Please select an image file (png or jpg only).</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer flex-nowrap p-0">
                        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Submit</strong></button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    
    // document.getElementById('addItem').addEventListener('submit', function (e) {
    //     let isValid = true; // Flag to track overall form validity

    //     // Check all required input fields
    //     const requiredFields = document.querySelectorAll('#addItem input[required]');
    //     requiredFields.forEach(function (field) {
    //         if (!field.value.trim()) {
    //             field.classList.add('is-invalid'); // Add invalid class
    //             isValid = false;
    //             alertify.error(`Please fill out the ${field.previousElementSibling.innerText} field.`);
    //         } else {
    //             field.classList.remove('is-invalid'); // Remove invalid class if valid
    //         }
    //     });

    //     // Validate item_image separately for file type
    //     const imageInput = document.getElementById('item_image');
    //     const file = imageInput.files[0];
    //     if (file) {
    //         const allowedExtensions = ['image/jpeg', 'image/png'];
    //         if (!allowedExtensions.includes(file.type)) {
    //             imageInput.classList.add('is-invalid'); // Add Bootstrap invalid class
    //             alertify.error("Invalid file type. Only JPG or PNG files are allowed.");
    //             isValid = false;
    //         } else {
    //             imageInput.classList.remove('is-invalid'); // Remove invalid class if valid
    //         }
    //     } else {
    //         imageInput.classList.add('is-invalid'); // Mark as invalid if no file is selected
    //         alertify.error("Please select an image file.");
    //         isValid = false;
    //     }

    //     // Prevent form submission if any field is invalid
    //     if (!isValid) {
    //         e.preventDefault();
    //     }
    // });

    // Price Validation
    const priceInput = document.getElementById('item_price');
    const priceError = document.getElementById('item_price_error');
    
    priceInput.addEventListener('blur', function () {
        const value = priceInput.value.trim();
        const decimalRegex = /^\d+(\.\d{1,2})?$/; // Regex for decimal numbers

        if (!decimalRegex.test(value)) {
            priceInput.classList.add('is-invalid');
            priceError.style.display = 'block';
            priceInput.focus();
        } else {
            priceInput.classList.remove('is-invalid');
            priceError.style.display = 'none';
        }
    });

    priceInput.addEventListener('input', function () {
        priceError.style.display = 'none';
        priceInput.classList.remove('is-invalid');
    });

    // Quantity Validation
    const quantityInput = document.getElementById('item_quantity');
    const quantityError = document.getElementById('item_quantity_error');

    quantityInput.addEventListener('blur', function () {
        const value = quantityInput.value.trim();
        const integerRegex = /^\d+$/; // Regex for positive integers

        if (!integerRegex.test(value) || parseInt(value) <= 0) {
            quantityInput.classList.add('is-invalid');
            quantityError.style.display = 'block';
            quantityInput.focus();
        } else {
            quantityInput.classList.remove('is-invalid');
            quantityError.style.display = 'none';
        }
    });

    quantityInput.addEventListener('input', function () {
        quantityError.style.display = 'none';
        quantityInput.classList.remove('is-invalid');
    });
</script>


<!-- Edit Item Modal class="modal fade d-block" -->
<div class="modal fade modal-sheet p-4 py-md-5" id="editItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Add item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 text-center">
                <form id="editItem" action="">
                    <input class="form-control" type="" name="id" id="id" value="">
                    <input class="form-control" type="" name="trid" id="trid" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="_item_name" name="_item_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_description" class="form-label">Item Description</label>
                                <input type="text" class="form-control" id="_item_description" name="_item_description" required>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_price" class="form-label">Item Price</label>
                                <input type="text" class="form-control" id="_item_price" name="_item_price" required>
                                <div id="item_price_error" class="invalid-feedback">Please enter a valid price (e.g., 123.45).</div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_category" class="form-label">Item Category</label>
                                <input type="text" class="form-control" id="_item_category" name="_item_category" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_quality" class="form-label">Item Quality</label>
                                <select class="form-select" id="_item_quality" name="_item_quality" required>
                                    <option disabled selected hidden> <-- SELECT --> </option>
                                    <option value="Best"> Best </option>
                                    <option value="Good"> Good </option>
                                    <option value="Damaged"> Damaged </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_quantity" class="form-label">Item Quantity</label>
                                <input type="text" class="form-control" id="_item_quantity" name="_item_quantity" required>
                                <div id="item_quantity_error" class="invalid-feedback">Please enter a valid quantity (positive integer only).</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="item_location" class="form-label">Item Location</label>
                                <input type="text" class="form-control" id="_item_location" name="_item_location" required>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="item_image" class="form-label">Item Image</label>
                                <input type="file" class="form-control" id="item_image" name="item_image" required>
                                <div class="invalid-feedback">Please select an image file (png or jpg only).</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer flex-nowrap p-0">
                        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Submit</strong></button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




























<!-- Delete Schools Modal class="modal fade d-block" -->
<div class="modal fade" id="deleteitemsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Delete Schools</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="deleteitems">
                    <input class="form-control" type="hidden" name="id" id="_id_" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid_" value="">

                    <div class="mb-3 row">
                        <label for="deleteitemsField" class="col-md-12 form-label">School Id:</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="_school_id_" name="school_id" disabled>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="deleteitemsField" class="col-md-12 form-label">School Name:</label>
                        <div class="col-md-12">
                            <textarea class="form-control" type="text" id="_school_name_" name="school_name" rows="3" disabled></textarea>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="webID" value="<?php echo $_SESSION['webID'] ?>">
                    <input class="form-control" type="hidden" id="webUsername" value="<?php echo $_SESSION['webUsername'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>