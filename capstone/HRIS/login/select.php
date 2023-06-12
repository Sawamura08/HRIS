<?php
if (isset($_POST["annoucementId"])) {
     $output = '';
     include("connection.php");
     $query = "SELECT * FROM hr_annoucement WHERE annoucementId = '" . $_POST["annoucementId"] . "'";
     $result = mysqli_query($connectionString, $query);
     $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
     while ($row = mysqli_fetch_array($result)) {
          $time = $row['scheduledTime'];
          $formattedTime = date("h:i A", strtotime($time));
          $date = $row['scheduledDate'];
          $formattedDate = date('l, F j, Y', strtotime($date));

          $output .= '  
                <tr>  
                     <td width="30%" class="table-success"><label>Date</label></td>  
                     <td width="70%" class="table-info">' . $formattedDate . '</td>  
                </tr>  
                <tr>  
                     <td width="30%" class="table-success"><label>Schedules Time</label></td>  
                     <td width="70%" class="table-info">' . $formattedTime . '</td>  
                </tr>  
                <tr>  
                     <td width="30%" class="table-success"><label>Purpose</label></td>  
                     <td width="70%" class="table-info">' . $row["purpose"] . '</td>  
                </tr>    
                <tr>  
                     <td width="30%" class="table-success"><label>Venue</label></td>  
                     <td width="70%" class="table-info">' . $row["venue"] . '</td>  
                </tr>    
                ';
     }
     $output .= "</table></div>";
     echo $output;
}