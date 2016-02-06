<?php include('_nav.php'); ?>

<?php include('_drawer.php'); ?>

<div class="container mdl-grid">
    <div  id="result" class="mdl-cell mdl-cell--4-col container">

    </div>
	<form class="mdl-cell mdl-cell--8-col mdl-card mdl-shadow--2dp" action="../index.php" method="post">
	    <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"> Student</h2>
        </div>
        <hr />
        <div class="mdl-card__supporting-text">
            <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--8-col">
        			
		            <input type="hidden" name="tag" value="student"  >
		            
        			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="number" name="number">
                        <label class="mdl-textfield__label" for="number">Student Number...</label>
                    </div>
    		    </div>
		    </div>
		    <div class="mdl-grid">
        		<div class="mdl-cell mdl-cell--8-col">
        		    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        			    <input type="email"  class="mdl-textfield__input" name="email" />
        				<label for="email" class="mdl-textfield__label">Email:</label>
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
</div>


<?php include('_scripts.php'); ?>
<?php include('_footer.php'); ?>
