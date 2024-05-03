<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script defer src="<?= base_url('./assets/js/main.js') ?>"></script> -->
    <title>Dashboard</title>
</head>

<body>

    <div class="main-app">

        <div class="container">
            <div class="table-form">
            <div class="form_main">
            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
            </div>
            
            <?php } 
            else if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
             <?php echo $this->session->flashdata('success'); ?>
             </div>
             <?php 
             }?>
                
                <form id="empform" action="<?= base_url('maincont/employeedetails') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="top">
                        <h3>Employee Details</h3>
                    </div>
                    <div class="input-control">
                        <label for="empid">Employee Id</label><br>
                        <input type="text" id="empid" name="empid">
                        <div class="error"></div>
                    </div>

                    <div class="input-control">
                        <label for="empname">Employee Name</label><br>
                        <input type="text" id="empname" name="empname">
                        <div class="error"></div>
                    </div>

                    <div class="input-control">
                        <label for="empgender">Employee Gender</label><br>
                        <select name="empgender" id="empgender">
                            <option value=" ">--Select--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="transgender">Transgender</option>
                        </select>
                        <div class="error"></div>
                    </div>

                    <div class="input-control">
                        <label for="empdesignation">Employee Designation</label><br>
                        <input type="text" name="empdesignation" id="empdesignation">
                        <div class="error"></div>
                    </div>


                    <div class="input-control">
                        <label for="empmobile">Employee Mobile</label><br>
                        <input type="text" name="empmobile" id="empmobile">
                        <div class="error"></div>
                    </div>

                    <div class="input-control">
                        <label for="empemail">Employee Email</label><br>
                        <input type="email" name="empemail" id="empemail">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control" id="butcontrol">
                        <button type="submit" class="submit" name="submit">Upload</button>
                    </div>
                </form>
            </div>
            <div class="logout"><a href="<?= base_url('maincont/dashboard') ?>">Go To Dashboard</a></div>
            </div>
        </div>
    </div>
    <script>
        const empform = document.getElementById('empform');
        const empid = document.getElementById('empid');
        const empname = document.getElementById('empname');
        const empgender = document.getElementById('empgender');
        const empdesignation = document.getElementById('empdesignation');
        const empmobile = document.getElementById('empmobile');
        const empemail = document.getElementById('empemail');

        empform.addEventListener('submit', e => {

            if (!validateInputs2()) {
                e.preventDefault();
            }
        });
        const setError2 = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');
        }
        const setSuccess2 = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        }
        const isValidEmail2 = empemail => {
            const mail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return mail.test(String(empemail).toLowerCase());
        }
        const validateInputs2 = () => {
            const empidValue = empid.value.trim();
            const empnameValue = empname.value.trim();
            const empdesignationValue = empdesignation.value.trim();
            const empgenderValue = empgender.value.trim();
            const empmobileValue = empmobile.value.trim();
            const empemailValue = empemail.value.trim();
            let success2 = true;
            if (empidValue === '') {
                success2 = false;
                setError2(empid, 'EmployeeId is required');
            }
            else {
                setSuccess2(empid);
            }
            if (empnameValue === '') {
                success2 = false;
                setError2(empname, 'Employee name is required');
            }
            else {
                setSuccess2(empname);
            }
            if (empemailValue === '') {
                success2 = false;
                setError2(empemail, 'Email is Required');
            }
            else if (!isValidEmail(empemailValue)) {
                success2 = false;
                setError2(empemail, 'Provide Valid Email Address');
            }
            else {
                setSuccess2(empemail);
            }
            if (empmobileValue === '') {
                success2 = false;
                setError2(empmobile, 'Phone Number is required');
            }
            else if (empmobileValue.lenght < 10) {
                success2 = false;
                setError2(empmobile, 'mobile number must be 10');
            }
            else {
                setSuccess2(empmobile);
            }
            if (empdesignationValue === '') {
                success2 = false;
                setError2(empdesignation, 'Designation is required');
            }
            else {
                setSuccess2(empdesignation);
            }

            if (empgenderValue === '') {
                success2 = false;
                setError2(empgender, 'Gender is required');
            }
            else {
                setSuccess2(empgender);
            }
            return success2;

        }
    </script>
</body>

</html>