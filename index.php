<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP & Javascript Fetch CRUD</title> 
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.js"></script>
    <script src="js/ajax-file.js"></script>
   
</head>
<body>
    
    <div class="info-upper-bg-img">
        <div class="infor-upper-color">
            <h1>Information About The Students</h1>
        </div>
    </div>
    <div id="main">
        
        <div id="table-data">
            <h3>All Records</h3>
            <button class="add_new"  id="addStudentModal">Add New</button>
            <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <thead>
                    <tr>
                        <th width="60px">Id</th>
                       
                        <th >St_Roll_No</th>
                        <th >St_Name</th>
                        <th >St_Email</th>
                        <th >St_Mobile</th>
                        <th >Grade</th>
                        
                        <th width="90px">Marks</th>
                        <th width="90px">Edit</th>
                        <th width="90px">Delete</th>
                        
                    </tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
        </div>
        <div id="error-message"></div>
        <div id="success-message"></div>

                        

    </div>
    <!-- modal for show add new -->
    <div id="addModal">
        <div id="modal-form">
            <h2>Add New Form</h2>
            <form method="POST" id="addModal-form">
                <table cellpadding="10px" width="100%" id="add-form">
                    <tr>
                        <td width="90px">Name</td>
                        <td><input type="text" id='fname'></td>
                    </tr>
                    <tr>
                        <td width="90px">Roll No</td>
                        <td><input type="text" id='roll_no'></td>
                    </tr>
                    <tr>
                        <td width="90px">Email</td>
                        <td><input type="text" id='email'></td>
                    </tr>
                    <tr>
                        <td width="90px">Mobile</td>
                        <td><input type="text" id='mobile'></td>
                    </tr>
                    
                            <label for="adhar_card_front">Adhar Card Front Image</label>
                            <input type="file" class="form-control" id="adhar_card_front" name="adhar_card_front">
                        
                        
                            <label for="adhar_card_back">Adhar Card Back Image</label>
                            <input type="file" class="form-control" id="adhar_card_back" name="adhar_card_back">
                        
                        
                            <label for="pancard">Pancard Image</label>
                            <input type="file" class="form-control" id="pancard" name="pancard">
                        
                    <tr>
                        <td></td>
                        <td><button type="button"  id='new-submit'>Save</button></td>
                    </tr>   
                </table>
            </form>
            <div id="close-btn" class="hide_modal">X</div>
        </div>
    </div>

    <!-- madal for show edit  -->
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <form method="POST">
                <table cellpadding="10px" width="100%" id="edit-form">
                    <tr>
                        <td width='90px'>Name</td>
                        <td>
                            <input type='text' id='edit-fname' autocomplete="off">
                            <input type = 'text' id='edit-id' hidden>
                        </td>
                    </tr>
                    <tr>
                        <td width='90px'>Roll No</td>
                        <td>
                            <input type='text' id='edit-roll_no' autocomplete="off">
                            
                        </td>
                    </tr>
                    <tr>
                        <td width='90px'>Email</td>
                        <td>
                            <input type='text' id='edit-email' autocomplete="off">
                            
                        </td>
                    </tr>
                    <tr>
                        <td width='90px'>Mobile</td>
                        <td>
                            <input type='text' id='edit-mobile' autocomplete="off">
                           
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><button type="button" onclick='modify_data()' id='edit-submit'>Update</button></td>
                    </tr>  
                </table>
            </form >
            <div id="close-btn" class="hide_modal">X<div>
            </div>
            </div>

        </div>
    </div>


    <div id="addMarksModal">
        <div id="modal-form">
            <h2>Add Marks Of Students</h2>
            <form method="POST" id="addModal-form">
                <table cellpadding="10px" width="100%" id="add-form">
                    <tr>
                        <td width="90px">Physics</td>
                        <td>
                            <input type="text" id='physics-marks'>
                            <input type = 'number' id='add-id' hidden>
                        </td>
                    </tr>
                    <tr>
                        <td width="90px">Chemistry</td>
                        <td><input type="text" id='chemistry-marks'></td>
                    </tr>
                    <tr>
                        <td width="90px">Mathematics</td>
                        <td><input type="text" id='mathematics-marks'></td>
                    </tr>
                    <tr>
                        <td width="90px">English</td>
                        <td><input type="text" id='english-marks'></td>
                    </tr>
                    <tr>
                        <td width="90px">Hindi</td>
                        <td><input type="text" id='hindi-marks'></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="text" onclick='add_Marks()' id='marks-submit'>Add Marks</button></td>
                    </tr>   
                </table>
            </form>
            <div id="close-btn" class="hide_modal">X</div>
        </div>
    </div>

    <h3><span class="span">Note*</span> Grade is calculated on the basis of percentage</h3>
    <div class="footer">
        <p>Author: Shishupal Singh</p>
        <p><a href="">codeshishupal@gmail.com</a></p>
    </div>
    
    
   
    

</body>
</html>
