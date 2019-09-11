<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.dataTables_filter{
  margin-right: 72%;
  margin-top: -24px;
}
.dataTables_length{
  display: none;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>  

<?php

?>

<h2>Bank Search Module</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<select id="mySelect" onchange="myFunction()">
  <option value="MUMBAI">Mumbai</option>
  <option value="BANGALORE">Bangalore</option>
  <option value="PUNE">Pune</option>
  <option value="DELHI">Delhi</option>
  <option value="NOIDA">Noida</option>
</select>
<br>
<!-- <p id="demo"></p> -->
  <div class="col-md-4 sessin" style="display: none;">
     <table class="tableSeesn" id="tble">
        <thead>
          <tr>
            <th class="sesnthtd">#</th>
            <th class="sesnthtd">Bank Name</th>
            <th class="sesnthtd">Ifsc</th>
            <th class="sesnthtd">Branch</th>
            <th class="sesnthtd">City</th>
          </tr>
        </thead>
        <tbody></tbody>
  
  
  
 
</table>
                
            </div>
 
</form>

<?php

?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
 
  // alert(x);
  $(".tableSeesn tbody").html('');
  $('#tble').DataTable().destroy();
  $.ajax({
            // datatype:"json",
            cache:false,
            url:"https://vast-shore-74260.herokuapp.com/banks?city="+x,
            // data:{user_id:t_person,commnt:comment,odr_id:odr_id},
            
            success: function (data) {
            
                 $(".sessin").show();
                  
                  data.forEach(function(value,i){
                  // console.log(value);
                  var banks_name = value.bank_name;
                  var ifsc = value.ifsc;
                  var branch = value.branch;
                  var city_name = value.city;
               
                  $(".tableSeesn tbody").append("<tr><td class= 'sesnthtd'>"+(i+1)+"</td><td class= 'sesnthtd'>"+banks_name+"</td><td class= 'sesnthtd'>"+ifsc+"</td><td class= 'sesnthtd' style= 'align:center;'>"+branch+"</td><td class= 'sesnthtd'>"+city_name+"</td></tr>");
                    });
                  
                  $('#tble').DataTable();
            },
        });

  // document.getElementById("demo").innerHTML = "You selected: " + x;
}

</script>
</body>
</html>