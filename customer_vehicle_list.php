<?php include './view/customer_header.php' ; ?>
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
                            <td><?php echo vehicle['year']; ?></td>
                            <td><?php echo vehicle['make']; ?></td>
                            <td><?php echo vehicle['model']; ?></td>
                            <td><?php echo vehicle['type']; ?></td>
                            <td><?php echo vehicle['class']; ?></td>
                            <td><?php echo vehicle['price']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php } else {?>
            <p>No Vehicles exist yet.</p>
        <?php } ?>
    </section>
</main>

<?php include './view/footer.php' ; ?>