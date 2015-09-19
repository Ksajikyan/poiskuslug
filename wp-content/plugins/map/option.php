
<?php
include_once('../../../wp-config.php');
//include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');


if (isset($_POST['width'])) {
        $width = $_POST['width'];
        $height = $_POST['height'];
        $zoom = $_POST['zoom'];

        //$con = mysqli_connect("localhost", "root", "", "$wpdb->dbname");

// Check connection
//        if (mysqli_connect_errno()) {
//            echo "Failed to connect to MySQL: " . mysqli_connect_error();
//        }
//        $select_from_option = mysqli_query($con, "SELECT id FROM wp_map_option");
//        $result = mysqli_fetch_row($select_from_option);
$tablename = $wpdb->prefix.'map_option';
    $select_from_map2 = $wpdb->get_row("SELECT * FROM $tablename");

        if (!empty($select_from_map2->id)){
            $insert_option= $wpdb->update(
                $wpdb->prefix .'map_option',
                array(
                    'width' => $width,
                    'height' => $height,
                    'zoom' => $zoom
                ),
                array( 'ID' => 1 )

            );

        }
else {
    $insert_option = $wpdb->insert(
        $wpdb->prefix .'map_option',
        array(
            'width' => $width,
            'height' => $height,
            'zoom' => $zoom
        )

    );
}


        if ($insert_option) {
            echo("<br>Map Options updated");
        } else {
            echo("<br>Map Options update is fail");
        }

    }


