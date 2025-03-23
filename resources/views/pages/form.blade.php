<style>
    /* General Styles */
.container {
    display: flex;
    justify-content: space-between;
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

/* Left Section */
.secondPhaseLeft {
    width: 60%;
}

.secondPhaseLeft h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.formWarper {
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
    width: 100%;
    font-size: 16px;
}

/* Right Section */
.secondPhaseRight {
    width: 35%;
}

.product_Sumary {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.product_Sumary h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.editCont {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.itemdetails {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 0;
}

.totalAmount {
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    font-weight: bold;
    padding: 10px 0;
    border-top: 1px solid #ccc;
}

.returnCase {
    margin: 10px 0;
}

.summary_note {
    background: #fff3cd;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
    margin-top: 10px;
}

button#editCount {
    background: transparent;
    border: 1px solid teal;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
    color: teal;
}

</style>


<section id="secondPhase">
    <div class="container">

        <aside class="secondPhaseLeft">
            <h3>1 . Tell us where to collect your stuff from</h3>
            <div class="formWarper">
                <form>
                    <input type="text" id="" name="" placeholder="Start typeing and select your address">

                    <div class="hiddenfild">

                        <div class="row">
                            <div class="col">
                                <input type="text" id="" name="first_name" placeholder="First name *" required>
                                <span class="requires"></span>
                            </div>
                            <div class="col">
                                <input type="text" id="" name="last_name" placeholder="Last name *" required>
                                <span class="requires"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="text" id="" name="building_name" placeholder="Bulding number/name *" required>
                                <span class="requires"></span>
                            </div>
                            <div class="col">
                                <input type="text" id="" name="address_one" placeholder="Address line 1 *" required>
                                <span class="requires"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="text" id="" name="address_two" placeholder="Address line 2 *" required>
                                <span class="requires"></span>
                            </div>
                            <div class="col">
                                <input type="text" id="" name="town" placeholder="Town *" required>
                                <span class="requires"></span>
                            </div>
                        </div>
                        <input type="text" id="" name="postcode" placeholder="Postcode *" required>
                        <textarea name="" id="" placeholder="Special instructions" cols="75" rows="4">

                        </textarea>
                    </div>
                </form>
                <p>
                    Or <span>enter manually</span>
                </p>

                <br>
                <button class="continue">Continue</button>
            </div>
        </aside>

        <aside class="secondPhaseRight">
            <div class="warpperRight">
                <div class="product_Sumary">
                    <h4>Due now - upfront payment</h4>
                    <div class="editCont">
                        <h4>Storage per month</h4>
                        <button id="editCount"> Edit</button>
                    </div>
                    <div class="itemdetails">
                        <div class="wrap">
                            <button>▼</button><span>10 items</span>
                        </div>
                        $99.25 / mo
                    </div>
                    <div class="totalAmount">
                        <span>total due today</span>
                        <span>$99.25</span>
                    </div>

                    <div class="returnCase">
                        <p><span>▼</span>Return charges apply</p>
                    </div>
                    <p>
                        Delivery fees are charged when you order your stuff back, <a href="#">find out more here</a>.
                    </p>
                    <div class="summary_note">
                        <p>FREE to cancel or amend your order if you let us know before 11am one working day prior to your collection or delivery.</p>
                    </div>

                </div>
            </div>
        </aside>


    </div>
 </section>
