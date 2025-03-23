<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Entry Component</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
        }

        .address-container {
            background-color: white;
            border-radius: 8px;
            padding: 24px;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .icon {
            width: 24px;
            height: 24px;
            background-color: #ff6b6b;
            border-radius: 50%;
            margin-right: 12px;
        }

        h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        p {
            margin: 0 0 16px 0;
            color: #555;
            font-size: 14px;
        }

        .address-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .manual-option {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .manual-link {
            color: #0066cc;
            text-decoration: none;
            cursor: pointer;
        }

        .continue-btn {
            background-color: #ccc;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            float: right;
        }

        #secondPhase {
            width: 30%;
            margin-top: 60px;
            margin-right: 40px
        }

        .secondPhaseLeft h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .formWarper {
            background: white;
            padding: 20px;
            border-radius: 5px;

            width: 100%;
            height: 320px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col {
            width: 48%;
        }

        textarea {
            resize: none;
        }

        /* Manual Entry */
        p span {
            color: teal;
            cursor: pointer;
            text-decoration: underline;
        }

        /* Button */
        .continue {
            background: teal;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 30%;
            font-size: 16px;
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    @include('fixed.header')
    <section id="secondPhase" >
        <div class="container">

            <aside class="secondPhaseLeft">
                <h3>1 . Tell us where to collect your stuff from</h3>
                <div class="formWarper">
                    <form>
                        <input type="text" id="" name=""
                            placeholder="Start typeing and select your address">
                        <!-- ===hidden fild=== -->
                        <div id="hiddenFildWarper" class="hidden">
                            <div class="hiddenfild">
                                <!-- ===name=== -->
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="" name="first_name" placeholder="First name *"
                                            required>
                                        <span class="requires"></span>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="" name="last_name" placeholder="Last name *"
                                            required>
                                        <span class="requires"></span>
                                    </div>
                                </div>
                                <!-- ===address=== -->
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="" name="building_name"
                                            placeholder="Bulding number/name *" required>
                                        <span class="requires"></span>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="" name="address_one"
                                            placeholder="Address line 1 *" required>
                                        <span class="requires"></span>
                                    </div>
                                </div>
                                <!-- ===address=== -->
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="" name="address_two"
                                            placeholder="Address line 2 *" required>
                                        <span class="requires"></span>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="" name="town" placeholder="Town *"
                                            required>
                                        <span class="requires"></span>
                                    </div>
                                </div>
                                <input type="text" id="" name="" placeholder="Postcode *" required>
                                <textarea name="instruction" id="" placeholder="Special instructions" cols="75" rows="4">

                                 </textarea>
                            </div>
                        </div>
                    </form>
                    <p>
                        Or <span id="showForm">enter manually</span>
                    </p>

                    <br>
                    <button class="continue" id="continue2ndPhase">Continue</button>
                </div>
            </aside>

        </div>
    </section>
    <script>
        let hiddenFildWarper = document.getElementById("hiddenFildWarper");
        document.getElementById("showForm").addEventListener('click', () => {
            hiddenFildWarper.classList.remove("hidden");
        });
    </script>
</body>

</html>
