<?php
include_once getcwd().'/vendor/autoload.php';


use RedBeanPHP\R;
if (session_id() == "")
{
    session_start();
}
?>

<?php
R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
$klein = new \Klein\Klein();

$klein->respond(function ($request, $response, $service, $app) use ($klein) {
    $klein->onError(function ($klein, $err_msg) {
        if ($klein instanceof \Klein\Klein)
        {
            $klein->service()->flash($err_msg);
            $klein->service()->back();
        }

    });


});

$klein->respond('GET', '/', function ($request, $response, $service, $app) {
        verifyLogin($response);
        include 'route/header.php';
        include_once 'route/work.php';
        include 'route/footer.php';
});

$klein->respond('GET','/login',function ($request, $response, $service, $app) {
    include 'route/header.php';
    include 'route/login.php';
    include 'route/footer.php';
});


$klein->respond('POST', '/login', function ($request, $response, $service, $app) {
    include 'actions/login.php';
});

$klein->respond('POST', '/saveCss', function ($request, $response, $service, $app) {
    include 'actions/saveCss.php';
});


$klein->respond('POST', '/saveJs', function ($request, $response, $service, $app) {
    include 'actions/saveJs.php';
});

$klein->respond('POST', '/saveHtml', function ($request, $response, $service, $app) {
    include 'actions/saveHtml.php';
});




$klein->respond('GET', '/project/[*:sessionId]', function ($request, $response, $service, $app) {
    verifyLogin($response);
    include 'route/header.php';
    include 'route/work.php';
    include 'route/footer.php';
});



$klein->respond('GET', '/qrCode/[*:sessionId]', function ($request, $response, $service, $app) {
    verifyLogin($response);
    $sessionId = $request->params()["sessionId"];
    include 'route/qrCode.php';
});

$klein->respond('GET', '/display/[*:sessionId]', function ($request, $response, $service, $app) {

    include 'route/display.php';
});



$klein->respond('GET', '/admin', function ($request, $response, $service, $app) {
    verifyLogin($response,"admin");
    include 'route/admin.php';
});

$klein->respond('GET', '/projects', function ($request, $response, $service, $app) {
    verifyLogin($response);
    include 'route/header.php';
    include 'route/projects.php';
    include 'route/footer.php';
});



$klein->respond('POST', '/admin/createUser', function ($request, $response, $service, $app) {
    verifyLogin($response,"admin");
    include 'admin/createUser.php';
});

$klein->respond('GET', '/delete', function ($request, $response, $service, $app) {
    verifyLogin($response);
    include 'route/delete.php';
});

$klein->respond('GET', '/signout', function ($request, $response, $service, $app) {
    verifyLogin($response);
    include 'route/signout.php';
});



$klein->respond('GET', '/saveInstance', function ($request, $response, $service, $app) {
    verifyLogin($response);
    include 'actions/saveInstance.php';
});

$klein->respond('GET', '/saveProject', function ($request, $response, $service, $app) {
    verifyLogin($response);
    include 'actions/saveProject.php';
});


function verifyLogin($response,$role = null)
{

    $notLoggedIn = !isset($_SESSION["loggedIn"]) || !($_SESSION["loggedIn"] instanceof \RedBeanPHP\OODBBean);


    if ($role !== null)
    {

        $notLoggedIn = $notLoggedIn && $_SESSION["loggedIn"]->getProperties()["role"] != $role;
    }

    if ($notLoggedIn)
    {
        $response->redirect('/login')->send();

    }

}

$klein->dispatch();

?>

