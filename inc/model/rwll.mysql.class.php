<?php
/**
 * Created by PhpStorm.
 * User: garth
 * Date: 11/4/15
 * Time: 12:07 PM
 * https://gist.github.com/geoffreyhale/57ca48bc97a7a954e9d5
 */

include(getenv('DOCUMENT_ROOT') . "/inc/model/db.mysql.pdo.class.php");

class eval_db {

    function __construct() {}

    function saveRegistration($data) {
        $db = new Database();
        $db->query('INSERT INTO evaluations (player_eval_id,player_first_name,player_last_name,player_img,eval_date,origin_lat,origin_lon)
                    VALUES
                    (:player_id, :player_first_name, :player_last_name, :player_img, :eval_date, :origin_lat, :origin_lon)
                    ON DUPLICATE KEY UPDATE
                    player_first_name = :player_first_name,
                    player_last_name = :player_last_name,
                    player_img = :player_img,
                    eval_date = :eval_date,
                    origin_lat = :origin_lat,
                    origin_lon = :origin_lon');

        $data['origin_lat'] = $data['origin_lat'] ? $data['origin_lat'] : NULL;
        $data['origin_lon'] = $data['origin_lon'] ? $data['origin_lon'] : NULL;

        $db->bind(':player_id', $data['player_eval_id']);
        $db->bind(':player_first_name', $data['player_first_name']);
        $db->bind(':player_last_name', $data['player_last_name']);
        $db->bind(':player_img', $data['player_img']);
        $db->bind(':eval_date', date("Y-m-d"));
        $db->bind(':origin_lat', $data['origin_lat']);
        $db->bind(':origin_lon', $data['origin_lon']);

        $db->execute();

        if($db->lastInsertId()) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    function saveFielding($data) {

        $db = new Database();
        $db->query('INSERT INTO evaluations (player_eval_id,fielding_ground_ball,fielding_fly_ball,fielding_throwing,fielding_iq,eval_date,origin_lat,origin_lon)
                    VALUES
                    (:player_id, :fielding_ground_ball, :fielding_fly_ball, :fielding_throwing, :fielding_iq, :eval_date, :origin_lat, :origin_lon)
                    ON DUPLICATE KEY UPDATE
                    fielding_ground_ball = :fielding_ground_ball,
                    fielding_fly_ball = :fielding_fly_ball,
                    fielding_throwing = :fielding_throwing,
                    fielding_iq = :fielding_iq,
                    eval_date = :eval_date,
                    origin_lat = :origin_lat,
                    origin_lon = :origin_lon');

        $data['origin_lat'] = $data['origin_lat'] ? $data['origin_lat'] : NULL;
        $data['origin_lon'] = $data['origin_lon'] ? $data['origin_lon'] : NULL;

        $db->bind(':player_id', $data['player_eval_id']);
        $db->bind(':fielding_ground_ball', $data['fielding_ground_ball']);
        $db->bind(':fielding_fly_ball', $data['fielding_fly_ball']);
        $db->bind(':fielding_throwing', $data['fielding_throwing']);
        $db->bind(':fielding_iq', $data['fielding_iq']);
        $db->bind(':eval_date', date("Y-m-d"));
        $db->bind(':origin_lat', $data['origin_lat']);
        $db->bind(':origin_lon', $data['origin_lon']);

        $db->execute();

        if($db->lastInsertId()) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    function saveHitting($data) {

        $db = new Database();
        $db->query('INSERT INTO evaluations (player_eval_id,hitting_contact,hitting_power,hitting_mechanics,hitting_baserunning,eval_date,origin_lat,origin_lon)
                    VALUES (:player_id, :hitting_contact, :hitting_power , :hitting_mechanics , :hitting_baserunning , :eval_date, :origin_lat, :origin_lon)
                    ON DUPLICATE KEY UPDATE
                    hitting_contact = :hitting_contact,
                    hitting_power = :hitting_power,
                    hitting_mechanics = :hitting_mechanics,
                    hitting_baserunning = :hitting_baserunning,
                    eval_date = :eval_date,
                    origin_lat = :origin_lat,
                    origin_lon = :origin_lon');

        $data['origin_lat'] = $data['origin_lat'] ? $data['origin_lat'] : NULL;
        $data['origin_lon'] = $data['origin_lon'] ? $data['origin_lon'] : NULL;

        $db->bind(':player_id', $data['player_eval_id']);
        $db->bind(':hitting_contact', $data['hitting_contact']);
        $db->bind(':hitting_power', $data['hitting_power']);
        $db->bind(':hitting_mechanics', $data['hitting_mechanics']);
        $db->bind(':hitting_baserunning', $data['hitting_baserunning']);
        $db->bind(':eval_date', date("Y-m-d"));
        $db->bind(':origin_lat', $data['origin_lat']);
        $db->bind(':origin_lon', $data['origin_lon']);

        $db->execute();

        if($db->lastInsertId()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    function saveHittingNoBaserunning($data) {

        $db = new Database();
        $db->query('INSERT INTO evaluations (player_eval_id,hitting_contact,hitting_power,hitting_mechanics,eval_date,origin_lat,origin_lon)
                    VALUES (:player_id, :hitting_contact, :hitting_power , :hitting_mechanics , :eval_date, :origin_lat, :origin_lon)
                    ON DUPLICATE KEY UPDATE
                    hitting_contact = :hitting_contact,
                    hitting_power = :hitting_power,
                    hitting_mechanics = :hitting_mechanics,
                    eval_date = :eval_date,
                    origin_lat = :origin_lat,
                    origin_lon = :origin_lon');

        $data['origin_lat'] = $data['origin_lat'] ? $data['origin_lat'] : NULL;
        $data['origin_lon'] = $data['origin_lon'] ? $data['origin_lon'] : NULL;

        $db->bind(':player_id', $data['player_eval_id']);
        $db->bind(':hitting_contact', $data['hitting_contact']);
        $db->bind(':hitting_power', $data['hitting_power']);
        $db->bind(':hitting_mechanics', $data['hitting_mechanics']);
        $db->bind(':eval_date', date("Y-m-d"));
        $db->bind(':origin_lat', $data['origin_lat']);
        $db->bind(':origin_lon', $data['origin_lon']);

        $db->execute();

        if($db->lastInsertId()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function savePitching($data) {

        $db = new Database();
        $db->query('INSERT INTO evaluations (player_eval_id,pitching_velocity,pitching_accuracy,pitching_mechanics,eval_date,origin_lat,origin_lon)
                    VALUES (:player_id, :pitching_velocity, :pitching_accuracy, :pitching_mechanics, :eval_date, :origin_lat, :origin_lon)
                    ON DUPLICATE KEY UPDATE
                    pitching_velocity = :pitching_velocity,
                    pitching_accuracy = :pitching_accuracy,
                    pitching_mechanics = :pitching_mechanics,
                    eval_date = :eval_date,
                    origin_lat = :origin_lat,
                    origin_lon = :origin_lon');

        $data['origin_lat'] = $data['origin_lat'] ? $data['origin_lat'] : NULL;
        $data['origin_lon'] = $data['origin_lon'] ? $data['origin_lon'] : NULL;

        $db->bind(':player_id', $data['player_eval_id']);
        $db->bind(':pitching_velocity', $data['pitching_velocity']);
        $db->bind(':pitching_accuracy', $data['pitching_accuracy']);
        $db->bind(':pitching_mechanics', $data['pitching_mechanics']);
        $db->bind(':eval_date', date("Y-m-d"));
        $db->bind(':origin_lat', $data['origin_lat']);
        $db->bind(':origin_lon', $data['origin_lon']);

        $db->execute();

        if($db->lastInsertId()) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    function saveBaserunning($data) {

        $db = new Database();
        $db->query('INSERT INTO evaluations (player_eval_id,hitting_baserunning,eval_date,origin_lat,origin_lon)
                    VALUES (:player_id, :hitting_baserunning , :eval_date, :origin_lat, :origin_lon)
                    ON DUPLICATE KEY UPDATE
                    hitting_baserunning = :hitting_baserunning,
                    eval_date = :eval_date,
                    origin_lat = :origin_lat,
                    origin_lon = :origin_lon');

        $data['origin_lat'] = $data['origin_lat'] ? $data['origin_lat'] : NULL;
        $data['origin_lon'] = $data['origin_lon'] ? $data['origin_lon'] : NULL;

        $db->bind(':player_id', $data['player_eval_id']);
        $db->bind(':hitting_baserunning', $data['hitting_baserunning']);
        $db->bind(':eval_date', date("Y-m-d"));
        $db->bind(':origin_lat', $data['origin_lat']);
        $db->bind(':origin_lon', $data['origin_lon']);

        $db->execute();

        if($db->lastInsertId()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkPlayerStation($player_id,$station=FALSE) {

        $station_where = FALSE;
        if($station == "fielding") {
            $station_where = ' AND (fielding_ground_ball IS NOT NULL OR fielding_fly_ball IS NOT NULL OR fielding_throwing IS NOT NULL OR fielding_iq IS NOT NULL)';
        }
        if($station == "pitching") {
            $station_where = ' AND (pitching_velocity IS NOT NULL OR pitching_accuracy IS NOT NULL OR pitching_mechanics IS NOT NULL)';
        }
        if($station == "hitting") {
            $station_where = ' AND (hitting_contact IS NOT NULL OR hitting_power IS NOT NULL OR hitting_mechanics IS NOT NULL OR hitting_baserunning IS NOT NULL)';
        }
        if($station == "hitting_no_baserunning") {
            $station_where = ' AND (hitting_contact IS NOT NULL OR hitting_power IS NOT NULL OR hitting_mechanics IS NOT NULL)';
        }
        if($station == "baserunning") {
            $station_where = ' AND (hitting_baserunning IS NOT NULL)';
        }

        if(!$station_where) {
            return FALSE;
        }

        $db = new Database();
        $db->query('SELECT player_eval_id FROM evaluations WHERE player_eval_id = :player_id '.$station_where);

        $db->bind(':player_id', $player_id);

        $db->execute();

        $num_rows = $db->rowCount();

        $row = $db->single();

        if($num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }


    }

    function getRowsOfData() {

        $db = new Database();
        $db->query('SELECT count(distinct player_eval_id) as data_count FROM evaluations');

        $db->execute();

        $num_rows = $db->rowCount();

        $row = $db->single();

        if($num_rows > 0) {
            return $row['data_count'];
        } else {
            return FALSE;
        }


    }

    /* not used */
    function getPlayerStats() {
        /**
         * Select a single row
         */
        $db = new Database();
        $db->query('SELECT FName, LName, Age, Gender FROM mytable WHERE FName = :fname');

        $db->bind(':fname', 'Jenny');

        $row = $db->single();

        echo "<pre>";
        print_r($row);
        echo "</pre>";

    }

    /* not used */
    function getPlayerIDS() {
        /**
         * Select multiple rows
         */
        $db = new Database();
        $db->query('SELECT FName, LName, Age, Gender FROM mytable WHERE LName = :lname');

        $db->bind(':lname', 'Smith');

        $rows = $db->resultset();

        echo "<pre>";
        print_r($rows);
        echo "</pre>";

        echo $db->rowCount();

    }


}
?>