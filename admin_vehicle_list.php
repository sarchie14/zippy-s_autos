<?php include './view/admin_header.php' ; ?>
<main>
    <section>
        <?php if(sizeof($vehicles) != 0 ) { ?>
            <div id="table-overflow">
                <table>
                    <thread>
                        <tr>
                            <th>Year</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Class</th>
                            <th>Price</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php foreach ($vehicles as $vehicle) : ?>
                        <tr>
                            <td><?php echo $vehicle['year']; ?></td>
                            <td><?php echo $vehicle['make']; ?></td>
                            <td><?php echo $vehicle['model']; ?></td>
                            <td><?php echo $vehicle['type']; ?></td>
                            <td><?php echo $vehicle['class']; ?></td>
                            <td><?php echo $vehicle['price']; ?></td>
                            <td><form action="" method="post">
                                <input type="hidden" name="vehicleID"
                                    value="<?php echo $vehicle['vehicleID']; ?>">
                                <input type="submit" value="Remove" class="button red">
                            </form></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p><a href="add_vehicle_form.php">Click here</a> to add a vehicle.</p>
        <?php } else {?>
            <p>No Vehicles exist yet.<a href="index.php?action=show_add_form">Click here</a> to add a vehicle.</p>
        <?php } ?>
        <br>
        <p><a href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>
    </section>
</main>

<?php include './view/footer.php' ; ?>