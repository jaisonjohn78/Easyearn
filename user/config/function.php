<?php
session_start();
include('db.php');

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['MESSAGE'] = $msg;
    } else {
        $msg = '';
    }
}

$pack1 = "https://pmny.in/jIEoN5GXJ7kQ";
$pack2 = "https://pmny.in/UI1VYoNLLxbz";
$pack3 = "https://pmny.in/Xr1VYhjpCfKz";

function redirect($location)
{
   ?>
<script>
window.location.href = "<?php echo $location; ?>";
</script>
<?php
}

//display session messg
function display_message()
{
    if (isset($_SESSION['MESSAGE'])) {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}


function login_user()
        {
            
            
        }
?>