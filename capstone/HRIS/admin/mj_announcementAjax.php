<?php
include('../connection.php'); // to connect to database
$value = isset($_POST['value']) ? $_POST['value'] : "";

?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <h1 class="text">Annoucement</h1>
        <?php

        $sql = "SELECT * FROM  hr_annoucement WHERE scheduledDate >= CURDATE() AND announcementId = $value";
        $query = $connectionString->query($sql);

        if ($query && $query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $scheduledDate = $row['scheduledDate'];
            $scheduledTime = $row['scheduledTime'];
            $newTime = date('h:i:s', strtotime($scheduledTime));
            $purpose = $row['purpose'];
            $venue = $row['venue'];
            $type = $row['type'] == 0  ? "Meeting" : "General";
        }

        ?>
        <div class="data">
            <form action="" method="post" id="announcement"></form>

            <input type="date" name="scheduledDate" id="" form="announcement" value="<?php echo $scheduledDate;  ?>" class="inputs">
            <input type="text" name="scheduledTime" id="" form="announcement" value="<?php echo $scheduledTime;  ?>" class="inputs">
            <input type="text" name="purpose" id="" form="announcement" value="<?php echo $purpose;  ?>" class="inputs purpose">
            <input type="text" name="venue" id="" form="announcement" value="<?php echo $venue;  ?>" class="inputs">
            <input type="text" name="type" id="" form="announcement" value="<?php echo $type == 0 ? "Meeting" : "General";  ?>" class="inputs">
        </div>
        <div class="buttonContainer">
            <input type="submit" value="Apply" id="go" form="announcement">
            <input type="button" value="Cancel" id="close">
        </div>
    </div>
</div>