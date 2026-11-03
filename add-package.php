<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Package | Club Tours</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="style.css">

    <style>

        body {
            background: #f4f8f8;
        }

        .admin-page {
            padding: 110px 20px 70px;
        }

        .admin-container {
            max-width: 850px;
            margin: auto;
        }

        .admin-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .admin-heading span {
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .admin-heading h1 {
            font-family: "Playfair Display";
            font-size: 45px;
            color: var(--dark);
            margin: 10px 0;
        }

        .admin-heading p {
            color: var(--muted);
        }

        .package-form {
            background: white;
            padding: 35px;
            border-radius: 22px;
            box-shadow: 0 15px 50px rgba(0,0,0,.08);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 700;
            font-size: 13px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #dce6e6;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .days-title {
            margin: 35px 0 18px;
            font-family: "Playfair Display";
            font-size: 25px;
            color: var(--dark);
        }

        .day-box {
            padding: 20px;
            border: 1px solid #e1eaea;
            border-radius: 14px;
            margin-bottom: 15px;
            background: #fafcfc;
        }

        .day-box h3 {
            margin: 0 0 15px;
            color: var(--primary);
        }

        .remove-day {
            border: none;
            background: #ffe8e8;
            color: #c0392b;
            padding: 8px 13px;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        .add-day {
            border: 1px dashed var(--primary);
            background: transparent;
            color: var(--primary);
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
        }

        .save-package {
            width: 100%;
            margin-top: 30px;
            padding: 16px;
            border: none;
            border-radius: 30px;
            background: var(--primary);
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .save-package:hover {
            background: var(--primary-dark);
        }

        @media(max-width:600px) {

            .form-row {
                grid-template-columns: 1fr;
            }

            .package-form {
                padding: 22px;
            }

            .admin-heading h1 {
                font-size: 36px;
            }

        }

    </style>

</head>


<body>

<section class="admin-page">

    <div class="admin-container">

        <div class="admin-heading">

            <span>
                CLUB TOURS
            </span>

            <h1>
                Add New Package
            </h1>

            <p>
                Add a new travel package to your website.
            </p>

        </div>


        <form
            class="package-form"
            action="save-package.php"
            method="POST"
            enctype="multipart/form-data">


            <!-- PACKAGE NAME -->

            <div class="form-group">

                <label>
                    Package Name
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Example: Dubai Special Package"
                    required>

            </div>


            <!-- CATEGORY + PRICE -->

            <div class="form-row">

                <div class="form-group">

                    <label>
                        Category
                    </label>

                    <select name="category" required>

                        <option value="">
                            Select Category
                        </option>

                        <option value="kerala">
                            Kerala
                        </option>

                        <option value="south">
                            South India
                        </option>

                        <option value="north">
                            North India
                        </option>

                        <option value="international">
                            International
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Price
                    </label>

                    <input
                        type="text"
                        name="price"
                        placeholder="₹25,999"
                        required>

                </div>

            </div>


            <!-- DURATION -->

            <div class="form-group">

                <label>
                    Duration
                </label>

                <input
                    type="text"
                    name="duration"
                    placeholder="04 Nights / 05 Days"
                    required>

            </div>


            <!-- LOCATION -->

            <div class="form-group">

                <label>
                    Location
                </label>

                <input
                    type="text"
                    name="location"
                    placeholder="Dubai"
                    required>

            </div>


            <!-- IMAGE -->

            <div class="form-group">

                <label>
                    Package Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    required>

            </div>


            <!-- DESCRIPTION -->

            <div class="form-group">

                <label>
                    Package Description
                </label>

                <textarea
                    name="description"
                    placeholder="Write about this package..."
                    required></textarea>

            </div>


            <!-- ITINERARY -->

            <h2 class="days-title">
                Day-wise Itinerary
            </h2>


            <div id="daysContainer">


                <div class="day-box">

                    <h3>
                        Day 01
                    </h3>

                    <div class="form-group">

                        <label>
                            Day Title
                        </label>

                        <input
                            type="text"
                            name="day_title[]"
                            placeholder="Arrival & Hotel Check-in"
                            required>

                    </div>

                    <div class="form-group">

                        <label>
                            Details
                        </label>

                        <textarea
                            name="day_description[]"
                            placeholder="Day 1 details..."
                            required></textarea>

                    </div>

                </div>

            </div>


            <button
                type="button"
                class="add-day"
                onclick="addDay()">

                <i class="fa-solid fa-plus"></i>

                Add Another Day

            </button>


            <!-- SAVE -->

            <button
                type="submit"
                class="save-package">

                <i class="fa-solid fa-cloud-arrow-up"></i>

                SAVE PACKAGE

            </button>


        </form>

    </div>

</section>


<script>

let dayNumber = 1;


function addDay() {

    dayNumber++;

    const container =
        document.getElementById("daysContainer");


    const box =
        document.createElement("div");

    box.className = "day-box";


    box.innerHTML = `

        <h3>
            Day ${String(dayNumber).padStart(2, "0")}
        </h3>

        <div class="form-group">

            <label>
                Day Title
            </label>

            <input
                type="text"
                name="day_title[]"
                placeholder="Day ${dayNumber} title"
                required>

        </div>

        <div class="form-group">

            <label>
                Details
            </label>

            <textarea
                name="day_description[]"
                placeholder="Day ${dayNumber} details..."
                required></textarea>

        </div>

        <button
            type="button"
            class="remove-day"
            onclick="removeDay(this)">

            Remove Day

        </button>

    `;


    container.appendChild(box);

}


function removeDay(button) {

    button.parentElement.remove();

}

</script>

</body>

</html>