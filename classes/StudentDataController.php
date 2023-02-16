<?php 
    include 'connection.php';
    class StudentDataController{
        public function __construct(){
            // if(isset($_POST['action']) && $_POST['action'] == 'addStudentData') {
            //     $this->addStudentData();
               
            // }
            // else if(isset($_GET['action'])&& $_GET['action'] == 'getData'){
            //     $this->fetchStudentData();
            // }
            if(isset($_REQUEST['action']) && $_REQUEST['action']=='addStudentData'){
                $this->addStudentData();    
            }
            elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='getData'){
                $this->fetchStudentData();
            }
            elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='fetchIdData'){
                $this->fetchIdData();
            }
            elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='updataData'){
                $this->updateData();
            }
            elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='deleteData'){
                $this->deleteData();
            }
            elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='addMarks'){
                $this->addMarks();
            }
            else if(isset($_POST['action'])&& $_POST['action'] == 'deleteStudentData'){
                $this->deleteStudentData();
            }
            else if(isset($_POST['action'])&& $_POST['action']=='updateStudentData'){
                // $this->updateStudentData();
            }
        }
        public function addStudentData(){
                $conn = new mysqli('localhost', 'root', '');
                echo "successfull";

                // Check for connection error
                if($conn->connect_error){
                die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
                }
                // Selecting Database
                $db = mysqli_select_db( $conn, "school"); // Selecting Database
                echo "successfull";

                print_r($_POST);
                print_r("me bhi hun");
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $roll_no = $_POST['rollno'];
               
                echo $name;
                echo $email;
                echo $mobile;
                echo $roll_no;
                
                
                if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['mobile']) || isset($_POST['roll_no'])) {
    
                    // //Insert Query
                    echo "me hu";
                    $insert= "Insert INTO student_data(student_name,student_roll_no,student_email,student_mobile) 
                    values ('$name','$roll_no', '$email', '$mobile')"; 
                    
                    
                    
                    
                    if($conn->query($insert)===TRUE){
                     echo 'Data inserted successfully';
                    }
                    else{
                     echo 'Error '.$conn->error;  
                    }
                }
        }
        public function fetchStudentData(){
           
            $conn = new mysqli('localhost', 'root', '');
                // echo "successfull";
    
                // Check for connection error
                if($conn->connect_error){
                    die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);  
                }

                // Selecting Database
                $db = mysqli_select_db($conn, "school"); // Selecting Database
                
                
                
                // $sql ="SELECT * FROM student_data";
                $sql = "SELECT student_data.student_id,student_data.student_name,student_data.student_roll_no,student_data.student_email,student_data.student_mobile,student_marks.grade
                FROM student_data
                LEFT JOIN student_marks
                ON student_data.student_id = student_marks.student_id";


                // echo $sql;
                 $result = mysqli_query($conn,$sql);
                //  print_r($result);
                 $output = array();
                 if(mysqli_num_rows($result)>0)
                 {
                    while($row = mysqli_fetch_assoc($result)){
                        $output[] = $row;
                    }
                 }else{
                    $output['empty']=['empty'];
                 }
                 mysqli_close($conn);
                 echo json_encode($output); 
        }
        public function fetchIdData(){
            $conn = new mysqli('localhost', 'root', '');
                // echo "successfull";
    
                // Check for connection error
                if($conn->connect_error){
                    die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);  
                }

                // Selecting Database
                $db = mysqli_select_db($conn, "school"); // Selecting Database
                
                $id = $_POST['id'];
                
                $sql ="SELECT * FROM student_data WHERE student_id={$id}";

                // echo $sql;
                 $result = mysqli_query($conn,$sql);
                //  print_r($result);
                 $output = array();
                 if(mysqli_num_rows($result)>0)
                 {
                    while($row = mysqli_fetch_assoc($result)){
                        $output[] = $row;
                    }
                 }else{
                    $output['empty']=['empty'];
                 }
                 mysqli_close($conn);
                 echo json_encode($output);

        } 

        public function updateData(){
            $conn = new mysqli('localhost', 'root', '');
                    // echo "successfull";
        
                    // Check for connection error
            if($conn->connect_error){
                        die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);  
            }

                    // Selecting Database
            $db = mysqli_select_db($conn, "school");
            $st_id = $_POST['id'];
            $Name = $_POST['name'];
            $roll_no = $_POST['rollno'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            echo $st_id." ".$Name." ".$roll_no." ".$email." ".$mobile;

            // updating data with
            $sql = "UPDATE  student_data SET student_name='{$Name}',student_roll_no='{$roll_no}',student_email='{$email}',student_mobile='{$mobile}' WHERE student_id={$st_id}";

            // run the command 
            if(mysqli_query($conn,$sql)){
                echo json_encode(array('update'=>'success'));

            }else{
                echo json_encode(array('update'=>'error'));
            }          
        }

        public function deleteData(){
            $conn = new mysqli('localhost', 'root', '');
                    // echo "successfull";
        
                    // Check for connection error
            if($conn->connect_error){
                die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);  
            }

                    // Selecting Database
            $db = mysqli_select_db($conn, "school");

            $id = $_POST['id'];
            $sql = "DELETE FROM student_data WHERE student_id={$id}";

            // run the command 
            if(mysqli_query($conn,$sql)){
                echo json_encode(array('delete'=>'success'));

            }else{
                echo json_encode(array('delete'=>'error'));
            }
        }
        public function addMarks(){
            $conn = new mysqli('localhost', 'root', '');
                    // echo "successfull";
        
                    // Check for connection error
            if($conn->connect_error){
                die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);  
            }

                    // Selecting Database
            $db = mysqli_select_db($conn, "school");

            $id = $_POST['id'];
            $cm =$_POST['cm'];
            $pm =$_POST['pm'];
            $mm =$_POST['mm'];
            $hm =$_POST['hm'];
            $em =$_POST['em'];
            $total_marks = $cm+$pm+$mm+$hm+$em;
            // echo($total_marks);
            
            $percent = $total_marks/5;
            
            // echo($percent);
            $grade="";
            if($percent>=90.0 && $percent<=100.0){
                $grade='A';
            }
            else if($percent>=80.0 && $percent<=89.0){
                $grade='B';
            }
            else if($percent>=70.0 && $percent<=79.0){
                $grade='C';
            }
            else if($percent>=60.0 && $percent<=70.0){
                $grade='D';
            }
            else {
                $grade='F';
            }
            // echo $grade;


            // echo $id." ".$cm." ".$pm." ".$mm." ".$hm." ".$em;
            if (isset($_POST['id']) || isset($_POST['cm']) || isset($_POST['pm']) || isset($_POST['mm']) || isset($_POST['hm']) || isset($_POST['em']) || isset($_POST['grade'])) {
    
                // //Insert Query
                
                $insert= "INSERT INTO student_marks(student_id,english_marks,math_marks,hindi_marks,physics_marks,chemistry_marks,grade) 
                values ('$id','$em','$mm','$hm','$pm','$cm','$grade')"; 
                
                if($conn->query($insert)===TRUE){
                    echo 'Data inserted successfully';
                   }
                   else{
                    echo 'Error '.$conn->error;  
                   }
                
                
                
            }
            else{
                alert("all feilds are required");
                return false;
            }
            
            

        }
    }

    $sdc=new StudentDataController();

?>