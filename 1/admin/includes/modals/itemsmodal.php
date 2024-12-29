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
        alertify.set('notifier', 'position', 'top-left');

function initializeAddItemValidation() {
    const form = document.getElementById('addItem');
    const submitButton = form.querySelector('button[type="submit"]');
    const priceInput = document.getElementById('item_price');
    const quantityInput = document.getElementById('item_quantity');
    
    // Removed imageInput event listener since image field is commented out

    // Price Validation
    priceInput.addEventListener('blur', validatePrice);
    priceInput.addEventListener('input', validatePrice);

    // Quantity Validation
    quantityInput.addEventListener('blur', validateQuantity);
    quantityInput.addEventListener('input', validateQuantity);

    // Re-check form validity dynamically
    document.querySelectorAll('#addItem input[required]').forEach(function (input) {
        input.addEventListener('input', checkFormValidity);
    });

    // Form submit event
    form.addEventListener('submit', function (e) {
        let errorCount = 0;

        // Check all required input fields
        const requiredFields = form.querySelectorAll('input[required]');
        requiredFields.forEach(function (field) {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                alertify.error(`Please fill out the ${field.previousElementSibling.innerText} field.`);
                errorCount++;
            } else {
                field.classList.remove('is-invalid');
            }
        });

        // Prevent submission if there are errors
        if (errorCount > 0) {
            e.preventDefault();
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    });

    // Helper functions
    function validatePrice() {
        const value = priceInput.value.trim();
        const decimalRegex = /^\d+(\.\d{1,2})?$/;

        if (!decimalRegex.test(value)) {
            priceInput.classList.add('is-invalid');
            alertify.error("Invalid price. Enter a valid decimal number.");
            submitButton.disabled = true;
        } else {
            priceInput.classList.remove('is-invalid');
            checkFormValidity();
        }
    }

    function validateQuantity() {
        const value = quantityInput.value.trim();
        const integerRegex = /^\d+$/;

        if (!integerRegex.test(value) || parseInt(value) <= 0) {
            quantityInput.classList.add('is-invalid');
            alertify.error("Invalid quantity. Enter a positive integer.");
            submitButton.disabled = true;
        } else {
            quantityInput.classList.remove('is-invalid');
            checkFormValidity();
        }
    }

    function checkFormValidity() {
        const allValid = Array.from(form.querySelectorAll('input[required]')).every(
            (field) => field.value.trim() && !field.classList.contains('is-invalid')
        );

        submitButton.disabled = !allValid;
    }
}

// Initialize validation
initializeAddItemValidation();
</script>


<!-- Edit Item Modal class="modal fade d-block" -->
<div class="modal fade modal-sheet p-4 py-md-5" id="editItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Edit item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 text-center">
                <form id="editItem" action="">
                    <input class="form-control" type="hidden" name="id" id="id" value="">
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
                                <input type="file" class="form-control" id="_item_image" name="_item_image" required>
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
    alertify.set('notifier', 'position', 'top-left');

// Input validation functions
function validateNumericInput(input, maxLength) {
    input.value = input.value.replace(/[^0-9]/g, '').slice(0, maxLength);
}

function validateDecimalInput(input, maxLength) {
    input.value = input.value.replace(/[^0-9.]/g, '').slice(0, maxLength);
    const parts = input.value.split('.');
    if (parts.length > 2) {
        input.value = parts[0] + '.' + parts.slice(1).join('');
    }
}

function validatePrice(input) {
    const value = input.value.trim();
    const decimalRegex = /^\d+(\.\d{1,2})?$/;

    if (!decimalRegex.test(value)) {
        input.classList.add('is-invalid');
        alertify.error("Invalid price. Enter a valid decimal number.");
        return false;
    }
    input.classList.remove('is-invalid');
    return true;
}

function validateQuantity(input) {
    const value = input.value.trim();
    const integerRegex = /^\d+$/;

    if (!integerRegex.test(value) || parseInt(value) <= 0) {
        input.classList.add('is-invalid');
        alertify.error("Invalid quantity. Enter a positive integer.");
        return false;
    }
    input.classList.remove('is-invalid');
    return true;
}

function validateFile(input, allowedExtensions, maxFileSize) {
    const file = input.files[0];

    if (!file) {
        input.classList.add('is-invalid');
        alertify.error("Please select an image file.");
        return false;
    }
    if (!allowedExtensions.includes(file.type)) {
        input.classList.add('is-invalid');
        alertify.error("Invalid file type. Only JPG or PNG files are allowed.");
        return false;
    }
    if (file.size > maxFileSize) {
        input.classList.add('is-invalid');
        alertify.error("File is too large. Maximum allowed size is 2 MB.");
        return false;
    }
    input.classList.remove('is-invalid');
    alertify.success("File is valid.");
    return true;
}

function checkFormValidity(form) {
    const inputs = form.querySelectorAll('input[required], select[required]');
    return Array.from(inputs).every((input) => input.value.trim() && !input.classList.contains('is-invalid'));
}

function initializeEditItemValidation() {
    const form = document.getElementById('editItem');
    const submitButton = form.querySelector('button[type="submit"]');

    // Element references
    const priceInput = document.getElementById('_item_price');
    const quantityInput = document.getElementById('_item_quantity');
    const imageInput = document.getElementById('_item_image');

    // Input event listeners
    priceInput.addEventListener('input', () => validateDecimalInput(priceInput, 13));
    quantityInput.addEventListener('input', () => validateNumericInput(quantityInput, 6));

    priceInput.addEventListener('blur', () => validatePrice(priceInput));
    quantityInput.addEventListener('blur', () => validateQuantity(quantityInput));

    if (imageInput) {
        imageInput.addEventListener('change', () => validateFile(imageInput, ['image/jpeg', 'image/png'], 2 * 1024 * 1024));
    }

    // Form submission event
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let isValid = true;

        // Validate required fields
        form.querySelectorAll('input[required]').forEach((field) => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                alertify.error(`Please fill out the ${field.previousElementSibling.innerText} field.`);
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });

        // Validate price and quantity
        if (!validatePrice(priceInput) || !validateQuantity(quantityInput)) {
            isValid = false;
        }

        // Validate file input
        if (imageInput && !validateFile(imageInput, ['image/jpeg', 'image/png'], 2 * 1024 * 1024)) {
            isValid = false;
        }

        if (isValid) {
            submitButton.disabled = false;
            form.submit(); // Submit the form if all validations pass
        } else {
            submitButton.disabled = true;
        }
    });

    // Dynamic form validation check
    form.querySelectorAll('input[required], select[required]').forEach((input) => {
        input.addEventListener('input', () => {
            submitButton.disabled = !checkFormValidity(form);
        });
    });
}

// Initialize validation on page load
initializeEditItemValidation();

</script>




















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