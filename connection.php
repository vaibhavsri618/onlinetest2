<?php
/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   "Display Name <AN@example.com>" 
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */

$username="root";
$userpass="";
$server='localhost';
$db='onlinetest';
$conn = new mysqli($server, $username, $userpass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

