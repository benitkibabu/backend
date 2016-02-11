<?php include('_nav.php'); ?>

<div class="container mdl-grid">
  <div  id="result" class="mdl-cell mdl-cell--4-col container">

  </div>
	<form class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp" action="../index.php" method="post">
	    <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"> Login</h2>
        </div>
        <hr />
        <div class="mdl-card__supporting-text">
            <div class="mdl-grid">
          		<div class="mdl-cell mdl-cell--12-col">
          			
  	            <input type="hidden" name="tag" value="login"  >
  		            
          			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="username">
                    <label class="mdl-textfield__label" for="code">UserName...</label>
                </div>
      		    </div>
  		    </div>
  		    <div class="mdl-grid">
          		<div class="mdl-cell mdl-cell--12-col">
          		    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          			    <input type="password"  class="mdl-textfield__input" name="password" />
          				<label for="name" class="mdl-textfield__label">Password..</label>
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

<?php include('_footer.php'); ?>