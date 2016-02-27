<?php include('_nav.php'); ?>

<?php include('_drawer.php'); ?>

<div class="container mdl-grid">
	<form class="mdl-cell mdl-cell--8-col mdl-card mdl-shadow--2dp" action="api/index.php" method="post">
	    <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"> UPDATES:</h2>
        </div>
        <hr />
        <div class="mdl-card__supporting-text">
            <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--8-col">
		            <input type="hidden" name="tag" value="update"  >
        			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="title" name="title">
                        <label class="mdl-textfield__label" for="title">Title...</label>
                    </div>
    		    </div>
		    </div>
		    <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--8-col">
        		    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        			    <textarea type="text"  class="mdl-textfield__input" name="body"></textarea>
        				<label for="body" class="mdl-textfield__label">Description:</label>
        			</div>
    		    </div>
		    </div>
		    <div class="mdl-grid">
                <label for="type" class="mdl-cell mdl-cell--2-col control-label">Type:</label>
        		<div class="mdl-cell mdl-cell--6-col">
        		   
    				<div class="col-sm-10">
    					<select  name="type" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
    						<option value="NCI">NCI</option>
    						<option value="NCI CAREER">NCI CAREER</option>
    						<option value="COMPUTING SUPPORT">COMPUTING SUPPORT</option>
    						<option value="LEARNING SUPPORT">LEARNING SUPPORT</option>
    						<option value="STUDENT UNION">STUDENT UNION</option>
    					</select>
    				</div>
    		    </div>
		    </div>
		    <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--6-col">
        		    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Add</button>
    		    </div>
		    </div>
        </div>
	</form>
	
	<div  id="result" class="mdl-cell mdl-cell--4-col container">

    </div>
</div>


<?php include('_scripts.php'); ?>

<script>
	$( document ).ready(function() {
		var htm = "";
		$.getJSON( "api/index.php?tag=getUpdates", function( data ) {
			$.each(data.result, function (k, v) {					
				//alert('index ' + v.title);
				htm += "<div class='mdl-button mdl-js-button mdl-js-ripple-effect'>"+
						"<span>"+ v.title + "</span>"+			
						"</div>	"+
						"<hr />";	
			});
			$('#result').html(htm);							
		});
	});
	
</script>

<?php include('_footer.php'); ?>
