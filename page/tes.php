<html>
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<table class="form-group">
<tr>   <th width="100">Name </th>
    <th>Price</th>
</tr>

<?php 
$i=1;

while($i<=10){ ?>
<tr>
    <td><span>Pen :</span></td>
    <td><input type="text" class='pc' /></td>
    <td><input type="text" class='kgkg prc' /></td>
    <td><input type="text" class='rc' /></td>
</tr>    
<?php $i++; }  ?>

<tr>
    <td><span><b>TOTAL  :</b></span></td>
    <td><b><span type="text" id="result"></span></b></td>
</tr>
</table>


<script>
$(document).ready(function(){

	
$(".form-group").on('input', '.prc', function () {
       var calculated_total_sum = 0;
     
       $(".form-group .prc").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("#result").html(calculated_total_sum);
       });

});

</script>
</body>
</html>
                        