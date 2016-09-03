<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Station Name</th>
                <th>Province</th>
                <th>Temperature</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Rainfall</th>
            </tr>
        </thead>
		<tbody>
			<?php foreach($weather["Stations"] as $wt){ ?>

<!--                --><?php //echo '<pre>'; print_r($wt["Latitude"]['Value']); exit;?>
			<tr>
				<td><?php echo $wt["StationNameTh"]; ?></td>
				<td><?php echo $wt["Province"]; ?></td>
				<td><?php echo $wt["Observe"]["Temperature"]["Value"]; ?></td>
                <td><?php echo number_format($wt["Latitude"]['Value'], 3); ?></td>
                <td><?php echo number_format($wt["Longitude"]['Value'], 3); ?></td>
                <td><?php echo $wt["Observe"]["Rainfall"]["Value"] . ' ' . $wt["Observe"]["Rainfall"]["Unit"]; ?></td>
			</tr>
			<?php } ?>
		</tbody>
        <tfoot>
            <tr>
                <th>Station Name</th>
                <th>Province</th>
                <th>Temperature</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Rainfall</th>
            </tr>
        </tfoot>
    </table>