<form method="post" action="<?php echo site_url()?>main/add_user/">
  <div class="row">
      <div class="large-6 columns">
        <label>Username
          <input type="text" placeholder="Username" name='username'/>
        </label>
      </div>
  </div>
  <div class="row">
      <div class="large-4 columns">
        <label>Password
          <input type="password" name='password' placeholder="Password" />
        </label>
      </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label>Position
        <select name='position'>
        <?php
          echo"<option>Position</option>";
          foreach ($position as $data) {
            echo"<option value=".$data->id_position.">".$data->name_position."</option>";
          }
        ?>
        </select>
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label>Level
        <select name='level'>
         <?php
          echo"<option>Level</option>";
          foreach ($level as $data) {
            echo"<option value=".$data->id_level.">".$data->name_level."</option>";
          }
        ?>
        </select>
      </label>
    </div>
  </div>
  <input type="submit" class="button" value="Register" name="register">
  
</form>

<table>
  <thead>
    <tr>
      <th width="200">Username</th>
      <th>Password</th>
      <th width="150">Position</th>
      <th width="100">Level</th>
      <th width="50">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    	foreach ($user as $data) {
      echo"<tr>
      <td>".$data->username."</td>
      <td>".$data->password."</td>
      <td>".$data->name_position."</td>
      <td>".$data->name_level."</td>
      <td><a href=".site_url()."main/delete_user>Delete</a></td>
    </tr>";	
		}		
    ?>
    
  </tbody>
</table>