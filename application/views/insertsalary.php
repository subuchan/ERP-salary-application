<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('./assets/css/style.css');?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Salary Upload</title>
</head>
<body>
    <div class="main-app">
    
        <div class="container">
            <div class="table_form">
            <div class="form">
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
                <form id="formsalary" action="<?=base_url('maincont/empsalary')?>" method="post" enctype="multipart/form-data">
                  <div class="top">
                    <h3>pay salary</h3>
                  </div>  
                  <div class="input-control">
                        <label for="salempid">Enter empid</label><br>
                        <input type="text" id="salempid" name="empid">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <label for="empsalary">Enter Salary</label><br>
                        <input type="text" id="empsalary" name="gross">
                        <!-- <input type="hidden" id="usermail" name="percentage1" value="60" > -->
                        <!-- <input type="hidden" id="usermail" name="percentage2" value="40" > -->
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
        const formsalary = document.getElementById('formsalary');
        const salempid = document.getElementById('salempid');
        const empsalary = document.getElementById('empsalary');

        formsalary.addEventListener('submit', e => {
            if (!validateInputs1()) {
                e.preventDefault();
            };
        });
        const setError1 = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');
        }
        const setSuccess1 = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        }
        const validateInputs1 = () => {
            const salempidValue = salempid.value.trim();
            const empsalaryValue = empsalary.value.trim();
            let success1 = true;
            if (salempidValue === '') {
                success1 = false;
                setError1(salempid, 'EmployeeId is required');
            }
            else {
                setSuccess1(salempid);
            }
            if (empsalaryValue === '') {
                success1 = false;
                setError1(empsalary, 'Enter Employee Salary');
            }
            
            else {
                setSuccess1(empsalary);
            }
            return success1;
        }
    </script>
</body>
</html>