<!-- Add Item Modal class="modal fade d-block" -->
<div class="modal fade" id="addItemModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Add item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="addItem" action="">

                    <div class="mb-3 row">
                        <label for="addItemField" class="col-md-2 form-label">item ID:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="item_id" name="item_id">
                        </div>
                        
                        <label for="addItemField" class="col-md-2 form-label">item District:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="item_district" name="item_district" required>
                                <option disabled selected hidden> <-- SELECT --> </option>
                                <?php
                                $romanNumerals = ["I", "II", "III", "IV", "V" , "VI"];
                                for ($i = 1; $i <= 6; $i++) {
                                    echo "<option value=\"" . $i . "\">" . $romanNumerals[$i - 1] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addItemField" class="col-md-2 form-label">item Name:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" id="item_name" name="item_name" rows="2"></textarea>
                        </div>

                        <label for="addItemField" class="col-md-2 form-label">item Principal:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" id="item_principal" name="item_principal" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addItemField" class="col-md-2 form-label">item Address:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="item_address" name="item_address" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addItemField" class="col-md-2 form-label">item Contact:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="item_contact" name="item_contact">
                        </div>

                        <label for="addItemField" class="col-md-2 form-label">item Email:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="item_email" name="item_email">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="addItemField" class="col-md-2 form-label">item Link:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="item_link" name="item_link">
                        </div>

                        <label for="addItemField" class="col-md-2 form-label">item Type:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="item_type" name="item_type" required>
                                <option value="ELEMENTARY itemS"> Elementary item </option>
                                <option value="JUNIOR HIGH itemS"> High item </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addItemField" class="col-md-2 form-label">SHS Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="item_shsAvailability" name="item_shsAvailability" disabled>
                                <option value="no"> NO </option>
                                <option value="yes"> YES </option>
                            </select>
                        </div>

                        <label for="addItemField" class="col-md-2 form-label">SPED Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="item_spedAvailablity" name="item_spedAvailablity" required>    
                                <option value="no"> NO </option>
                                <option value="yes"> YES </option>
                            </select>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="webID" value="<?php echo $_SESSION['webID'] ?>">
                    <input class="form-control" type="hidden" id="webUsername" value="<?php echo $_SESSION['webUsername'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>