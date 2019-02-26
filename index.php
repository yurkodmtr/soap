<html>
<head>
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/myscript.js"></script>
</head>
<body>



    <div class="search_form">
    	<form>
    		<div class="row">
    			<div class="title">City/Resort</div>
    			<select class="_city">
    				<option value="118593">All</option>
    			</select>
    		</div>
    		<div class="row">
    			<div class="title">Hotel Category</div>
    			<select class="_hotel_category">
    				<option>All</option>
    			</select>
    		</div>
    		<div class="row">
    			<div class="title">Hotel Name</div>
    			<select class="_hotel_name">
    				<option>All</option>
    			</select>
    		</div>
    		<div class="row">
    			<div class="title">Check-in date</div>
    			<input type="date" class="_check_in_date">
    		</div>
    		<div class="row">
    			<div class="title">Check-out date</div>
    			<input type="date" class="_check_out_date">
    		</div>
            <div class="row">
                <div class="title">Nights count</div>
                <input type="number" class="_nights_count" min="1" value="1">
            </div>
    		<div class="row">
    			<div class="title">Board type</div>
    			<select class="_board_type">
    				<option>ALL</option>
    				<option>BB</option>
    				<option>HB</option>
    				<option>FB</option>
    				<option>HB+treatment</option>
    				<option>FB+treatment</option>
    			</select>
    		</div>
    		<div class="row">
    			<div class="title">Adults</div>
    			<select class="_adults">
    				<option value="1">1</option>
    				<option value="2">2</option>
    				<option value="3">3</option>
    				<option value="4">4</option>
    				<option value="5">5</option>
    				<option value="6">6</option>
    				<option value="7">7</option>
    				<option value="8">8</option>
    				<option value="9">9</option>
    			</select>
    		</div>
    		<div class="row">
    			<div class="title">Children</div>
    			<select class="_children">
    				<option>1</option>
    				<option>2</option>
    				<option>3</option>
    			</select>
    		</div>
    		<div class="row">
    			<input type="submit" value="Submit">
    		</div>
    	</form>
    </div>

    <div class="loader" style="display:none;text-align:center;">loader</div>
    

    <table class="table" style="width:100%;" border="1px">
    	<tr>
    		<td>Name</td>
    		<td>Category</td>
    	</tr>
    </table>

</body>
</html>