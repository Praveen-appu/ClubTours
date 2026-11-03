<?php

header("Content-Type: text/html; charset=UTF-8");


/* ===============================
   BASIC DATA
================================ */

$name = trim($_POST["name"] ?? "");
$category = trim($_POST["category"] ?? "");
$price = trim($_POST["price"] ?? "");
$duration = trim($_POST["duration"] ?? "");
$location = trim($_POST["location"] ?? "");
$description = trim($_POST["description"] ?? "");


if (
    $name === "" ||
    $category === "" ||
    $price === "" ||
    $duration === "" ||
    $location === "" ||
    $description === ""
) {

    die("Please fill all required fields.");

}


/* ===============================
   IMAGE UPLOAD
================================ */

if (!isset($_FILES["image"])) {

    die("Please upload a package image.");

}


$image = $_FILES["image"];

$allowedTypes = [
    "image/jpeg",
    "image/png",
    "image/webp"
];


if (!in_array($image["type"], $allowedTypes)) {

    die("Only JPG, PNG and WEBP images are allowed.");

}


$uploadFolder = __DIR__ . "/uploads/";


if (!is_dir($uploadFolder)) {

    mkdir($uploadFolder, 0755, true);

}


$extension =
    strtolower(
        pathinfo(
            $image["name"],
            PATHINFO_EXTENSION
        )
    );


$fileName =
    time() . "_" .
    preg_replace(
        "/[^a-zA-Z0-9_-]/",
        "-",
        $name
    ) .
    "." .
    $extension;


$imagePath =
    $uploadFolder . $fileName;


if (!move_uploaded_file(
    $image["tmp_name"],
    $imagePath
)) {

    die("Image upload failed.");

}


/* ===============================
   ITINERARY
================================ */

$dayTitles =
    $_POST["day_title"] ?? [];

$dayDescriptions =
    $_POST["day_description"] ?? [];


$itinerary = [];


for (
    $i = 0;
    $i < count($dayTitles);
    $i++
) {

    if (
        trim($dayTitles[$i]) === "" ||
        trim($dayDescriptions[$i]) === ""
    ) {
        continue;
    }


    $itinerary[] = [

        "day" =>
            str_pad(
                $i + 1,
                2,
                "0",
                STR_PAD_LEFT
            ),

        "title" =>
            trim($dayTitles[$i]),

        "description" =>
            trim($dayDescriptions[$i])

    ];

}


/* ===============================
   PACKAGE OBJECT
================================ */

$package = [

    "id" =>
        uniqid("package_"),

    "name" =>
        $name,

    "category" =>
        $category,

    "price" =>
        $price,

    "duration" =>
        $duration,

    "location" =>
        $location,

    "description" =>
        $description,

    "image" =>
        "uploads/" . $fileName,

    "itinerary" =>
        $itinerary,

    "created" =>
        date("Y-m-d H:i:s")

];


/* ===============================
   READ EXISTING PACKAGES
================================ */

$jsonFile =
    __DIR__ . "/packages.json";


if (!file_exists($jsonFile)) {

    file_put_contents(
        $jsonFile,
        "[]"
    );

}


$json =
    file_get_contents($jsonFile);


$packages =
    json_decode($json, true);


if (!is_array($packages)) {

    $packages = [];

}


/* ===============================
   ADD PACKAGE
================================ */

$packages[] = $package;


/* ===============================
   SAVE
================================ */

file_put_contents(
    $jsonFile,
    json_encode(
        $packages,
        JSON_PRETTY_PRINT |
        JSON_UNESCAPED_UNICODE
    )
);


/* ===============================
   SUCCESS
================================ */

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Package Added</title>

    <style>

        body {
            font-family: Arial;
            background: #f4f8f8;
            display: grid;
            place-items: center;
            min-height: 100vh;
        }

        .success {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 50px rgba(0,0,0,.1);
        }

        .success i {
            font-size: 50px;
            color: #25D366;
        }

        .success a {
            display: inline-block;
            margin-top: 20px;
            padding: 13px 25px;
            border-radius: 30px;
            background: #087f8f;
            color: white;
            text-decoration: none;
        }

    </style>

</head>


<body>

<div class="success">

    <div style="font-size:50px;">
        ✓
    </div>

    <h2>
        Package Added Successfully!
    </h2>

    <p>
        Your package is now available on the website.
    </p>

    <a href="packages.php">
        View Packages
    </a>

</div>

</body>

</html>