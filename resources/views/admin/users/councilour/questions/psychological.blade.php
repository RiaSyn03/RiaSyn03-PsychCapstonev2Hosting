@extends('layouts.app')

@section('content')
<H1>Create Question</H1>
<form class="insert-form" id="insert_form" method="POST" action="/psychological">
@csrf
<div class="input-field">
    <table class="table table-bordered" id="table_field">
        <tr>
            <th>Anwers</th>
            <th>Add/Remove</th>
</tr>
<tr>
<td><select name="txtAnswer">
<option value="0">Not at all</option>
      <option value="1">Several days</option>
      <option value="2">More than half the days</option>
      <option value="3">Nearly every day</option>
</select>
</td>
<td><input class="btn btn-warning" type="button" name="add" id="add" value="add"></td>
</tr>
</table>
<input class="btn btn-success" type="submit" name="save" id="save" value="Save Data"/>

	</form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
             html = '<tr><td><select name="txtAnswer"><option value="9:00-10:00 AM">Not at all</option><option value="10:00-11:00 AM">Several days</option><option value="11:00-12:00 PM">More than half the days</option><option value="11:00-12:00 PM">Nearly every day</option></select></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="remove"></td></tr>';
        });

        var x = 1;

         $("#add").click(function(){
             $("#table_field").append(html);
         });
         $("#table_field").on('click','#remove',function(){
             $(this).closest('tr').remove();
            });
         
         
         
    </script>
</body>
</html>
@endsection