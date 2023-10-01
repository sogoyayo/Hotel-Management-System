<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();

// $data = file_get_contents('php://input');
// $data = json_decode($data);

// $usertoken = input_check($data->usertoken);
// $address = input_check($data->address);
// $phone = input_check($data->phone);
// $fname = input_check($data->fname);
// $lname = input_check($data->lname);
// $country = input_check($data->country);
// $city = input_check($data->city);

// $state = input_check($data->state);
// $zip_code = input_check($data->zip_code);

// $proof_of_id = json_encode($data->proof_of_id);
// $company_reg_cert = json_encode($data->company_reg_cert);
// $proof_of_address = json_encode($data->proof_of_address);

// $proof_of_id = json_encode(input_check($data->proof_of_id));
// $company_reg_cert = json_encode(input_check($data->company_reg_cert));
// $proof_of_address = json_encode(input_check($data->proof_of_address));


$company_reg_cert = '';
$proof_of_address = '';
$proof_of_id = '';
// $proof_of_id = "PHN2ZyBoZWlnaHQ9IjU0MyIgdmlld0JveD0iMTcuMDg2IDE3LjE5MiA4ODUuODI4IDE2NS42MTciIHdpZHRoPSIyNTAwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im04NTUuOTYzIDE1OS4zMzdjMC0xMi45NjIgMTAuNTI0LTIzLjQ3OCAyMy40NzktMjMuNDc4IDEyLjk2MiAwIDIzLjQ3MiAxMC41MTYgMjMuNDcyIDIzLjQ3OHMtMTAuNTEgMjMuNDcyLTIzLjQ3MiAyMy40NzJjLTEyLjk1NSAwLTIzLjQ3OS0xMC41MS0yMy40NzktMjMuNDcyIiBmaWxsPSIjODZiYzI0Ii+PHBhdGggZD0ibTEwNy4xOTUgOTcuMTZjMC0xNC44NzEtMi44NzMtMjUuOTA0LTguNjItMzMuMDkyLTUuNzU1LTcuMTgtMTQuNDctMTAuNzY3LTI2LjE5LTEwLjc2N2gtMTIuNDY1djkwLjkzOGg5LjUzOGMxMy4wMTYgMCAyMi41NTQtMy44NiAyOC42MjgtMTEuNjA0IDYuMDY2LTcuNzMgOS4xMS0xOS41NTggOS4xMS0zNS40NzVtNDQuNDU2LTEuNTVjMCAyNy4wOTMtNy4yODIgNDcuOTctMjEuODQ4IDYyLjYyMy0xNC41NjUgMTQuNjYtMzUuMDQgMjEuOTktNjEuNDM0IDIxLjk5aC01MS4yODR2LTE2Mi4zNDNoNTQuODY1YzI1LjQ0OCAwIDQ1LjA5NSA2LjY2NSA1OC45NCAxOS45ODcgMTMuODM5IDEzLjMyOSAyMC43NjEgMzIuNTY4IDIwLjc2MSA1Ny43NDVtMTQyLjA1OCA4NC42MWg0MC44MDh2LTE2My4wMjRoLTQwLjgwOHptOTguMTM3LTYwLjgwOWMwIDEwLjM5NCAxLjM1OCAxOC4zMjIgNC4wNyAyMy43NyAyLjcxNyA1LjQ1NiA3LjI2OCA4LjE4IDEzLjY2NyA4LjE4IDYuMzMyIDAgMTAuODA5LTIuNzI0IDEzLjQxOC04LjE4IDIuNjA4LTUuNDQ4IDMuOTA2LTEzLjM3NiAzLjkwNi0yMy43NyAwLTEwLjM0LTEuMzE4LTE4LjEzOS0zLjk2LTIzLjQwMy0yLjY1LTUuMjgtNy4xNjgtNy45MjItMTMuNTc0LTcuOTIyLTYuMjY0IDAtMTAuNzQgMi42My0xMy40NTggNy44Ni0yLjcxIDUuMjM4LTQuMDcgMTMuMDU3LTQuMDcgMjMuNDY1bTc2LjU5NyAwYzAgMTkuODAzLTUuMTkgMzUuMjUyLTE1LjU5OCA0Ni4zMjUtMTAuNCAxMS4wOC0yNC45NTkgMTYuNjI0LTQzLjY3NSAxNi42MjQtMTcuOTQ4IDAtMzIuMjM1LTUuNjY2LTQyLjg0LTE2Ljk5OC0xMC42MTgtMTEuMzMxLTE1LjkyNC0yNi42NDQtMTUuOTI0LTQ1Ljk1IDAtMTkuNzQzIDUuMTk4LTM1LjA4MyAxNS42MDUtNDYuMDIgMTAuNDA3LTEwLjkzOCAyNS0xNi40MDYgNDMuNzktMTYuNDA2IDExLjYxMSAwIDIxLjg4MyAyLjUzNCAzMC43ODIgNy41OTUgOC45MDYgNS4wNiAxNS43ODIgMTIuMzEgMjAuNjEyIDIxLjc1MyA0LjgzNyA5LjQyOSA3LjI0OCAyMC40NjIgNy4yNDggMzMuMDc3bTE2LjIwNyA2MC44MDloNDAuODE1di0xMjEuMDk0aC00MC44MTV6bS0uMDAyLTEzNS43NDJoNDAuODE2di0yNy4yODhoLTQwLjgxNnptMTIzLjUwNyAxMDQuODU2YzUuNTEgMCAxMi4wNzItMS40IDE5LjcyOC00LjE3OHYzMC40NjljLTUuNTAzIDIuNDE4LTEwLjczNCA0LjE1LTE1LjcwNyA1LjE3Ni00Ljk3MiAxLjA0LTEwLjgwOCAxLjU1Ni0xNy40ODYgMS41NTYtMTMuNzAzIDAtMjMuNTgtMy40NDQtMjkuNjQ3LTEwLjMyLTYuMDQtNi44NzQtOS4wNjktMTcuNDMxLTkuMDY5LTMxLjY3N3YtNDkuOTJoLTE0LjI5NHYtMzEuMzAzaDE0LjI5NHYtMzAuOTI1bDQxLjEyOC03LjE1M3YzOC4wNzdoMjYuMDR2MzEuMzA1aC0yNi4wNHY0Ny4xMzNjMCA3Ljg0IDMuNjg5IDExLjc2IDExLjA1MyAxMS43Nm05NC40NjEgMGM1LjUxIDAgMTIuMDczLTEuNCAxOS43MjktNC4xNzh2MzAuNDY5Yy01LjQ5NiAyLjQxOC0xMC43MzQgNC4xNS0xNS43MDcgNS4xNzYtNC45OCAxLjA0LTEwLjc5NCAxLjU1Ni0xNy40ODYgMS41NTYtMTMuNzAyIDAtMjMuNTgtMy40NDQtMjkuNjM0LTEwLjMyLTYuMDUyLTYuODc0LTkuMDgyLTE3LjQzMS05LjA4Mi0zMS42Nzd2LTQ5LjkyaC0xNC4zdi0zMS4zMDNoMTQuM3YtMzEuMzkzbDQxLjEyLTYuNjg1djM4LjA3N2gyNi4wNTR2MzEuMzA1aC0yNi4wNTN2NDcuMTMzYzAgNy44NCAzLjY4OSAxMS43NiAxMS4wNiAxMS43Nm03MS4yMjctNDQuNjc1Yy41NTctNi42MyAyLjQ1My0xMS40ODggNS42ODYtMTQuNTkyIDMuMjQ4LTMuMDk4IDcuMjU2LTQuNjQ3IDEyLjA1Mi00LjY0NyA1LjIzMSAwIDkuMzg5IDEuNzM5IDEyLjQ3MyA1LjI0NCAzLjEwNCAzLjQ4NSA0LjcyMSA4LjE1MyA0Ljg1IDEzLjk5NXptNTcuNTU1LTMzLjM5N2MtOS43MDItOS41MS0yMy40NjUtMTQuMjczLTQxLjI3LTE0LjI3My0xOC43MTcgMC0zMy4xMiA1LjQ2OS00My4yMTUgMTYuNDA2LTEwLjA4OCAxMC45MzgtMTUuMTM1IDI2LjYzLTE1LjEzNSA0Ny4wOCAwIDE5LjgwMiA1LjQ1NSAzNS4wNzQgMTYuMzM4IDQ1Ljc5NCAxMC44OSAxMC43MiAyNi4xODIgMTYuMDg3IDQ1Ljg3NiAxNi4wODcgOS40NTcgMCAxNy41OTYtLjY0NSAyNC40MTYtMS45MjkgNi43OC0xLjI3IDEzLjM0My0zLjU2NyAxOS43MDktNi44ODJsLTYuMjcxLTI3LjI5Yy00LjYyNiAxLjg5LTkuMDI4IDMuMzQzLTEzLjE4NiA0LjMtNi4wMDUgMS4zOTQtMTIuNTk1IDIuMDkzLTE5Ljc3IDIuMDkzLTcuODY2IDAtMTQuMDc1LTEuOTIyLTE4LjYyNy01Ljc2Ny00LjU1Mi0zLjg1Mi02Ljk3Ny05LjE2NS03LjI1NS0xNS45MzFoNzIuOTQ4di0xOC41OTRjMC0xNy44ODctNC44NS0zMS41OS0xNC41NTgtNDEuMDk0bS02MjUuNTgzIDMzLjM5N2MuNTU3LTYuNjMgMi40NTMtMTEuNDg4IDUuNjg2LTE0LjU5MiAzLjI0LTMuMDk4IDcuMjU1LTQuNjQ3IDEyLjA1OS00LjY0NyA1LjIxNyAwIDkuMzc1IDEuNzM5IDEyLjQ2NiA1LjI0NCAzLjEwNCAzLjQ4NSA0LjcxNCA4LjE1MyA0Ljg1NyAxMy45OTV6bTU3LjU2MS0zMy4zOTdjLTkuNzA4LTkuNTEtMjMuNDY1LTE0LjI3My00MS4yNzctMTQuMjczLTE4LjcyMyAwLTMzLjExOCA1LjQ2OS00My4yMDcgMTYuNDA2LTEwLjA4OCAxMC45MzgtMTUuMTQyIDI2LjYzLTE1LjE0MiA0Ny4wOCAwIDE5LjgwMiA1LjQ0OCAzNS4wNzQgMTYuMzQ1IDQ1Ljc5NCAxMC44ODMgMTAuNzIgMjYuMTc1IDE2LjA4NyA0NS44NyAxNi4wODcgOS40NTYgMCAxNy41OTUtLjY0NSAyNC40MTUtMS45MjkgNi43OC0xLjI3IDEzLjM0My0zLjU2NyAxOS43MTUtNi44ODJsLTYuMjc3LTI3LjI5Yy00LjYyNyAxLjg5LTkuMDI5IDMuMzQzLTEzLjE4IDQuMy02LjAxOCAxLjM5NC0xMi42MDEgMi4wOTMtMTkuNzc2IDIuMDkzLTcuODYgMC0xNC4wNzUtMS45MjItMTguNjI3LTUuNzY3LTQuNTU5LTMuODUyLTYuOTc3LTkuMTY1LTcuMjU1LTE1LjkzMWg3Mi45NDh2LTE4LjU5NGMwLTE3Ljg4Ny00Ljg1LTMxLjU5LTE0LjU1Mi00MS4wOTQiIGZpbGw9IiMwZjBiMGIiLz48L3N2Zz4=";

$usertoken = "T9I1OJTKV1";
$address = "Ibadan";
$phone = "+2348069366034";
$fname = "Olawande";
$lname = "Akinmosin";
$country = "Nigeria";
$city = "Ibadan";

$state = "Oyo";
$zip_code = "200005";
$apptoken = "HB2JHK342";

// {"mail":"samueldacoal@gmail.com","fname":"Olawande","lname":"Akinmosin","phone":"+2348069366034","role":"3","address":"Ibadan","usertoken":"T9I1OJTKV1","country":"Nigeria","state":"Oyo","city":"Ibadan","zip_code":"200005","apptoken":"HB2JHK342"}


if (isset($apptoken)) {
    // if (isset($data->apptoken)) {

    // $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        // if (empty($usertoken) || empty($fname) || empty($lname) || empty($address) || empty($phone) || empty($country) || empty($city) || empty($state) || empty($zip_code) || empty($proof_of_id) || empty($company_reg_cert) || empty($proof_of_address)) {
        //     # code...
        //     $array = array(
        //         'success' => false,
        //         'message' => "Empty fields..."
        //     );
        //     echo json_encode($array);
        //     exit();
        // }

        if (!checkUserExist($mysqli, $usertoken)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Invalid user."
            );
            echo json_encode($array);
            exit();
        }

        // if (updateUserProfile($mysqli, $usertoken, $fname, $lname, $address, $phone, $country, $city, $state, $zip_code, $proof_of_id, $company_reg_cert, $proof_of_address)) {
        if (updateUserData($mysqli, $usertoken, $zip_code) == true) {
            # code...
            $array = array(
                'success' => true,
                'message' => "Your profile has been updated."
            );
            echo json_encode($array);
            exit();
        } else {
            $array = array(
                'success' => false,
                'message' => "Something went wrong! Failed to update profile. Please try again"
            );
            echo json_encode($array);
            exit();
        }
    } else {
        $array = array(
            'success' => false,
            'message' => "Unauthorized access..contact support"
        );
        echo json_encode($array);
        exit();
    }
} else {
    $array = array(
        'success' => false,
        'message' => "Token not set.."
    );
    echo json_encode($array);
    exit();
}
