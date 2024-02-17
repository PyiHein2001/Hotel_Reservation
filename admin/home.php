


<style>
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
.candidate {
    margin: auto;
    width: 23vw;
    padding: 0 10px;
    border-radius: 20px;
    margin-bottom: 1em;
    display: flex;
    border: 3px solid #00000008;
    background: #8080801a;

}
.candidate_name {
    margin: 8px;
    margin-left: 3.4em;
    margin-right: 3em;
    width: 100%;
}
	.img-field {
	    display: flex;
	    height: 8vh;
	    width: 4.3vw;
	    padding: .3em;
	    background: #80808047;
	    border-radius: 50%;
	    position: absolute;
	    left: -.7em;
	    top: -.7em;
	}
	
	.candidate img {
    height: 100%;
    width: 100%;
    margin: auto;
    border-radius: 50%;
}
.vote-field {
    position: absolute;
    right: 0;
    bottom: -.4em;
}

</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			<button class="card col-md-4 offset-2 bg-info float-left booking-button" id="booking" type="button">
				<div class="card-body text-white text-align:center">
					<h4><b>Booking</b></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-users"></i></span>
					<h3 class="text-right"><b></b></h3>
				</div>
			</button>
			<button class="card col-md-4 offset-2 bg-primary ml-4 float-left room-button" id="room" type="button">
				<div class="card-body text-white">
					<h4><b>Rooms</b></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-user-tie"></i></span>
					<h3 class="text-right"><b></b></h3>
				</div>
			</button>
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				
					<div id="roomTableContainer" style="display:none" >	
					<?php
                        // Database connection and fetching data
                        include('db_connect.php');

                        $sql = "SELECT * FROM room_categories ORDER BY id";
                        $result = $conn->query($sql);
						
					


                        if ($result->num_rows > 0 ) {
                            echo '<table class="table table-bordered table-hover">';
                            echo '<thead><tr><th class="text-center">ID</th><th class="text-center">Room Number</th><th class="text-center">Capacity</th><th class="text-center">Available</th></tr></thead>';
                            echo '<tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
								echo '<td class="text-center">'.$row["id"].'</td>';
                                echo '<td class="text-center">' . $row["name"] . '</td>';
                                echo '<td class="text-center">' . $row["Room_count"] . '</td>';
								$checkedQuery = "SELECT COUNT(room_id) as COUNT FROM checked WHERE status=1 AND room_id=" . $row["id"];
								$checkedResult = $conn->query($checkedQuery);
            					$checkedCount = 0;
								if ($checkedResult->num_rows > 0) {
									$checkedRow = $checkedResult->fetch_assoc();
									$checkedCount = $checkedRow["COUNT"];
								}
								echo '<td class="text-center">' . $row["Room_count"]-$checkedCount . '</td>';
                                
                                echo '</tr>';
                            }
						
                            echo '</tbody>';
                            echo '</table>';
                        }

                        $conn->close();
                        ?>
					</div>
			</div>
		</div>
	</div>
</div>




<script>
	$(document).ready(function(){
		$('.room-button').click(function(){
			
			/*var tableHtml='<table class="table">';
			tableHtml +='<thead><tr><th>Room Type</th><th class="text-center">Capacity</th><th>Availabe Room</th></tr></thead>';
			tableHtml +='<tbody>';
			


			tableHtml +='<tr><td >Single Room</td><td class="text-center">6</td><td></td></tr>';
			//tableHtml +='<tr><td>Double Room</td><td class="text-center">6</td><td></td></tr>';
			//tableHtml +='<tr><td>Twin Room</td><td class="text-center">6</td><td></td></tr>';
			//tableHtml +='<tr><td>Deluxe Room</td><td class="text-center">6</td><td></td></tr>';
			//tableHtml +='<tr><td>Family Room</td><td class="text-center">6</td><td></td></tr>';

			*/
			
			$('#roomTableContainer').show();
		
		})
	})

</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>






