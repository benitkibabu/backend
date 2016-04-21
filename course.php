<?php include('_nav.php'); ?>

<?php include('_drawer.php'); ?>


<div class="container mdl-grid">
	<form class="mdl-cell mdl-cell--8-col mdl-card mdl-shadow--2dp" action="../index.php" method="post">
	    <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"> Course</h2>
        </div>
        <hr />
        <div class="mdl-card__supporting-text">
            <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--8-col">
        			
		            <input type="hidden" name="tag" value="course"  >
		            
        			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="code" name="code">
                        <label class="mdl-textfield__label" for="code">Course Code...</label>
                    </div>
    		    </div>
		    </div>
		    <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--8-col">
        		    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        			    <input type="text"  class="mdl-textfield__input" name="name" />
        				<label for="name" class="mdl-textfield__label">Course Name:</label>
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
		$.getJSON( "api/index.php?tag=getCourses", function( data ) {
			$.each(data.result, function (k, v) {					
				//alert('index ' + v.title);
				htm += '<div class="mdl-button mdl-js-button mdl-js-ripple-effect">'+
						'<span>'+ v.course_code + '</span>'+			
						'</div>	'+
						'<hr />';	
			});
			$('#result').html(htm);							
		});
	});
	
</script>
<?php include('_footer.php'); ?>
