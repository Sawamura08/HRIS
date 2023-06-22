<?php
include('../connection.php'); // to connect to database
$value = isset($_POST['value']) ? $_POST['value'] : "";


if (isset($_POST['apply'])) {
    $scheduledDate = $_POST['scheduledDate'];
    $scheduledTime = $_POST['scheduledTime'];
    $purpose = $_POST['purpose'];
    $venue = $_POST['venue'];
    $type = $_POST['type'] == "Meeting" ? 0 : 1;

    $update = "UPDATE hr_annoucement SET scheduledDate = '$scheduledDate', scheduledTime = '$scheduledTime', purpose = '$purpose', venue = '$venue', type = $type WHERE announcementId = '$value'";
    $updateQuery = $connectionString->query($update);
    if ($updateQuery && $updateQuery) {
        echo "success";
    } else {
        echo "fail";
    }
}

if (isset($_POST['value'])) {
    $sql = "SELECT * FROM  hr_annoucement WHERE scheduledDate >= CURDATE() AND announcementId = $value";
    $query = $connectionString->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $scheduledDate = $row['scheduledDate'];
        $scheduledTime = $row['scheduledTime'];
        $newTime = date('h:i:s', strtotime($scheduledTime));
        $purpose = $row['purpose'];
        $venue = $row['venue'];
        $type = $row['type'];
    }
}

?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <h1 class="text">Annoucement</h1>
        <div class="data">
            <form method="POST" id="announcement"> </form>
            <input type="hidden" name="value" value="<?php echo $value; ?>">
            <input type="date" name="scheduledDate" id="" form="announcement" value="<?php echo $scheduledDate;  ?>"
                class="inputs">
            <input type="text" name="scheduledTime" id="time" form="announcement" value="<?php echo $scheduledTime;  ?>"
                class="inputs">
            <input type="text" name="purpose" id="" form="announcement" value="<?php echo $purpose;  ?>"
                class="inputs purpose">
            <input type="text" name="venue" id="" form="announcement" value="<?php echo $venue;  ?>" class="inputs">
            <select name="type" id="" class="inputs" form="announcement">
                <option value="" selected disabled hidden>
                    <?php

                    echo $type == 0 ? "Meeting" : "General";

                    ?>
                </option>
                <option value="0">Meeting</option>
                <option value="1">General</option>
            </select>
        </div>
        <div class="buttonContainer">
            <input type="submit" value="Apply" id="go" form="announcement" name="apply">

            <input type="button" value="Cancel" id="close">
        </div>

    </div>
</div>