<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<style>
    .button_css{
    width: 50%;
    height: 40px;
    position: relative;
    top: 20px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    background-color: rgb(98, 98, 230);
    color: white;
    font-size: 20px;
    }
    #login_form {
    width: 100%;
    height: 100%;
    position: relative;
    top: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    row-gap: 10px;
}
label{
   font-size: 20px;
}
.other_students{
 width: 100%;
 height:60%;
 display: flex;
 flex-direction: column;
 overflow-x: auto;
}
table {
    width: 100%;
    position: relative;
    border-collapse: collapse;
}

table th {
 
    background-color: #b9cf38c9;
}

table td {
    text-align: center;
    cursor: pointer;
}

input[type="checkbox"] {
    cursor: pointer;
    width: 18px;
    height: 18px;
}
#uenrolled{
width: 80%;
font-size: 20px;
}

    </style>
</head>

<body>
    <div class="form_outer_div">
        <form id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
         <h2>Manage Students</h2>
         <div class="user_data">
          <label id="name">Name :</label>
          <label id="uname"></label></br>
          <label id="contact">Contact :</label>
          <label id="ucontact"></label></br>
          <label id="education">Education :</label>
          <label id="ueducation"></label></br>
          <label id="enrolled">Enrolled :</label>
          <label id="uenrolled"></label>
         </div>
         <div class="other_students">
         <table id="table">
                <tr>
                    <th>Student Name</th>
                    <th>Permission</th>
                    
                </tr>
         </table>
         </div>
            <div class="message_display">
                <div class="message">asdsaasdasd</div>
                <div class="close_massage">&#10006</div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src='../javascript/manage_stud.js'></script>
</body>

</html>