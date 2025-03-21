
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <title>leonardoemlh</title>
    <!-- ====google font==== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- ====stylesheet==== -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
        {{-- header part --}}
       @include('fixed.header')

    <!-- =====first Phase===== -->
    <div id="firstPhase">
        <main>
            <!-- ====content heading==== -->
            <section class="buildPlan container">
                <h1>Build Your Storage Plan</h1>
                <p>Book now, pay later. You will not be charged until your Pickup appointment.</p>
                <div class="note">
                    <img src="/img/dollars.png" alt="png" width="25px">
                    <p>LIMITED-TIME PROMO: Get 2 Months of FREE Storage for a Storagehotel Large Box!</p>
                </div>
            </section>
            <!-- ==aside warpper==== -->
            <div id="contentWarpper" class="container">
                <aside class="leftSection">
                    <section class="boxes container">
                        <h2>Boxes</h2>
                        <p>We provide <b>FREE</b> storage boxes with tape, delivered to you at your Supply Appointment.</p>
                        <p class="iconText">
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path
                                        d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm-20-80h40v-100h100v-40H740v-100h-40v100H600v40h100v100Z" />
                                </svg></span>
                            <b>You won't be charged for boxes you don't use. Simply return any unused boxes during
                                Pickup.</b> We
                            recommend you order more boxes than you think you need. The typical student uses at least 7
                            Storagehotel
                            Large Boxes. <span><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm-20-80h40v-100h100v-40H740v-100h-40v100H600v40h100v100Z" />
                                </svg></span>
                        </p>
                        <div class="item_warpper">
                            <div class="itemImage"></div>
                            <div class="temContent">
                                <h3>Storagehotel Large Box</h3>
                                <p class="dimention">18” x 18” x 16”</p>
                                <p class="price">$20 /month</p>
                            </div>
                            <div class="count">
                                <button class="decrement">-</button>
                                <div class="result">0</div>
                                <button class="increment">+</button>
                            </div>
                        </div>
                        <p><b>Already have your own boxes? </b>Add them as Custom Items below!</p>
                    </section>
                </aside>
                <aside class="rightSection">
                    <div class="payment-box">
                        <h2>Due now - upfront payment</h2>
                        <p>Storage per month</p>
                        <div class="divider"></div>
                        <div class="total">
                            <span>Total due today</span>
                            <span>FREE</span>
                        </div>
                        <div class="divider"></div>
                        <p class="return-info">▼ Return charges apply</p>
                        <p>Delivery fees are charged when you order your stuff back, <a href="#">find out more here.</a></p>
                        <div class="note">
                            FREE to cancel or amend your order if you let us know before 11am one working day prior to your collection or delivery.
                        </div>
                    </div>
                </aside>
            </div>
        </main>
        <section class="commonItems container">
            <h2>Common Items</h2>
        <div class="item-list">
            <div class="item">
                <img src="carry-on.png" alt="Carry-On Suitcase">
                <h3>Carry-On Suitcase</h3>
                <p>$20 /month</p>
                <div class="quantity">
                    <button>-</button>
                    <span>0</span>
                    <button>+</button>
                </div>
            </div>
            <div class="item">
                <img src="check-in.png" alt="Check-In Suitcase">
                <h3>Check-In Suitcase</h3>
                <p>$30 /month</p>
                <div class="quantity">
                    <button>-</button>
                    <span>0</span>
                    <button>+</button>
                </div>
            </div>
            <div class="item">
                <img src="bicycle.png" alt="Bicycle">
                <h3>Bicycle</h3>
                <p>$40 /month</p>
                <div class="quantity">
                    <button>-</button>
                    <span>0</span>
                    <button>+</button>
                </div>
            </div>
        </div>
        </section>
        <!-- ==========Mattresses========= -->
        <section class="Mattresses container">
            <div class="warpper">
                <h2>Mattresses</h2>
                <p>Mattresses are required to be in a sealed mattress bag for hygienic reasons. If needed, we can provide a
                    mattress bag to you at your Supply or Pickup Appointment.</p>
                <div id="productContainer">

                </div>
            </div>
        </section>
        <!-- ========CustomItems========= -->
        <section id="CustomItems">
            <div class="container CustomItem">
                <h2>Custom Items</h2>
                <p>Don't see your item above? Enter the dimensions of your item below to create a custom item!</p>
                <p>
                    Please review our <a href="#">FAQ page</a> to know what you can store.
                    <b>Mattress toppers</b> are required to be in a <b>sealed bag</b> for hygienic reasons.
                </p>
                <div class="form">
                    <form>
                        <div class="inputbox">
                            <label for="itemLength">name of item</label>
                            <input type="text" id="itemName" name="itemName">
                        </div>

                        <div class="input_warpper">
                            <div class="inputbox">
                                <label for="itemLength">item Length</label>
                                <input type="text" id="itemLength" name="itemLength">
                            </div>
                            <div class="inputbox">
                                <label for="itemWidth">item Width</label>
                                <input type="text" id="itemWidth" name="itemWidth">
                            </div>
                            <div class="inputbox">
                                <label for="itemHeight">item Height</label>
                                <input type="text" id="itemHeight" name="itemHeight">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="desc">
                    <p>Total Cubic Feet : 0</p> <span>$0/month</span>
                </div>
                <button class="customItemBtn">Add custom item</button>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const inputs = document.querySelectorAll('.inputbox input');
                const lengthInput = document.getElementById('itemLength');
                const widthInput = document.getElementById('itemWidth');
                const heightInput = document.getElementById('itemHeight');
                const cubicFeetDisplay = document.getElementById('cubicFeet');
                const monthlyPriceDisplay = document.getElementById('monthlyPrice');

                // Price per cubic foot
                const pricePerCubicFoot = 2; // $2 per cubic foot per month

                // Handle floating labels
                inputs.forEach(input => {
                    // Check if there's any value already in the input
                    if (input.value) {
                        input.previousElementSibling.classList.add('filled');
                    }

                    // On focus, add the 'filled' class to the label
                    input.addEventListener('focus', () => {
                        input.previousElementSibling.classList.add('filled');
                    });

                    // On blur, remove the 'filled' class if the input is empty
                    input.addEventListener('blur', () => {
                        if (input.value === '') {
                            input.previousElementSibling.classList.remove('filled');
                        }
                    });
                });

                // Calculate cubic feet and price
                function calculateCubicFeetAndPrice() {
                    const length = parseFloat(lengthInput.value) || 0;
                    const width = parseFloat(widthInput.value) || 0;
                    const height = parseFloat(heightInput.value) || 0;

                    const cubicFeet = (length * width * height) / 1728; // Convert cubic inches to cubic feet
                    const roundedCubicFeet = Math.max(Math.round(cubicFeet * 100) / 100, 0);
                    const monthlyPrice = Math.max(Math.round(roundedCubicFeet * pricePerCubicFoot * 100) / 100, 0);

                    cubicFeetDisplay.textContent = roundedCubicFeet;
                    monthlyPriceDisplay.textContent = `$${monthlyPrice}/month`;
                }

                // Add event listeners to dimension inputs
                lengthInput.addEventListener('input', calculateCubicFeetAndPrice);
                widthInput.addEventListener('input', calculateCubicFeetAndPrice);
                heightInput.addEventListener('input', calculateCubicFeetAndPrice);

                // Handle the Add custom item button
                document.querySelector('.customItemBtn').addEventListener('click', function() {
                    const itemName = document.getElementById('itemName').value;
                    const cubicFeet = parseFloat(cubicFeetDisplay.textContent);

                    if (!itemName) {
                        alert('Please enter an item name');
                        return;
                    }

                    if (cubicFeet <= 0) {
                        alert('Please enter valid dimensions');
                        return;
                    }

                    alert(`Added ${itemName} (${cubicFeet} cubic feet) to your storage plan`);

                    // Clear the form
                    document.querySelectorAll('.inputbox input').forEach(input => {
                        input.value = '';
                        input.previousElementSibling.classList.remove('filled');
                    });

                    calculateCubicFeetAndPrice();
                });
            });
        </script>
    </div>
    <!-- ======second phase====== -->

    <!-- =========cursor========= -->
    <div class="custom-cursor"></div>
    <!-- =====scripts====== -->
    <script src="/js/script.js"></script>
</body>

</html>
