
        <?php
            
            $hostname = 'localhost';
            $username = 'klft2';
            $password = 'likexin#0304';
            $database = 'klft2';
            $link = mysqli_connect($hostname, $username, $password, $database) or die ("connection Error on Line 31: ".mysqli_connect_error());

                               
            function executeQuery($sql)
            {
                global $link;
                $result = mysqli_query ($link, $sql) or die ("Query Error: " .mysqli_error($link));
                echo "<table class='table table-hover'><thead>";
                while($fieldinfo = mysqli_fetch_field($result)){
                    echo "<th>".$fieldinfo->name."</th>";
                }
                while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                    echo "<tr>";
                    foreach($row as $r){
                        echo "<td>$r</td>";
                    }
                    echo "</tr>";
                }
            }
            if(isset($_POST['submit'])){
                
                $to = addslashes ($_POST['TO_']);
                $from = addslashes ($_POST['FROM_']);
                $date = addslashes ($_POST['DATE_']);
                SELECT * FROM Flight_Offering WHERE TO_='' and FROM_ = '' and DATE_='';
            
            }
                
           
         if(isset($_POST['add'])) {
            $hostname = 'localhost';
            $username = 'xlwbc';
            $password = 'Best2014';
            $database = 'xlwbc';
            $conn = mysql_connect($hostname, $username, $password, $database);
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() ) {
               $USER_EMAIL = addslashes ($_POST['USER_EMAIL']);
               $USER_PASSWORD = addslashes ($_POST['USER_PASSWORD']);
            }else {
               $USER_EMAIL = $_POST['USER_EMAIL'];
               $USER_PASSWORD = $_POST['USER_PASSWORD'];
            }

            

            $sql = "INSERT INTO USER ". "(USER_EMAIL,USER_PASSWORD,) ". "VALUES('USER_EMAIL', 'USER_PASSWORD',NOW())";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );

            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }

            echo "Entered data successfully\n";

            mysql_close($conn);
         }else {
           
                               
        ?>
    