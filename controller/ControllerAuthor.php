<?php

ini_set('display_errors',1);
error_reporting(E_ALL);


class ControllerAuthor{
   
	private   $db = null;
	protected $data = array();
	
	public function __construct(){
	 
		$this->db = DB::getInstance(); 
	
	}
	
	public function actionIndex(){
		
	}
	
	
	


	//Использование плесхолдеров!

	public function actionInsertAuthor(){
		echo "<h2>Insert Authors</h2>";
		echo'
			<form method = "POST" name ="webForm" action ="index.php?page=author&action=insertAuthor" >
				<input type="text" name="idauthor"  hidden/><br/>
					<label for="name">Name:</label>
				<input type="text" name="name"  placeholder ="Name" maxlength = "25" required/><br/>
					<label for="sername">Sername:</label>
				<input type="text" name="sername"  placeholder ="Sername" maxlength ="25" required/><br/>	
				<input type="submit" value="Submit" name="Submit"/>
			</form>
			';
		if(isset($_POST['idauthor']) & !empty($_POST['idauthor'])){
					$idauthor = $_POST['idauthor'];
			}
		if(isset($_POST['name']) & !empty($_POST['name'])){
			$name = $_POST['name'];
		}
		if(isset($_POST['sername']) & !empty($_POST['sername'])){
			$sername = $_POST['sername'];
		
		}
		
		$sql = "INSERT INTO author (idauthor,name,sername) VALUES (:idauthor,:name,:sername)";
		$res = $this->db->prepare($sql);
		
			$res->bindParam(':idauthor',$idauthor,PDO::PARAM_INT);
            $res->bindParam(':name',$name, PDO::PARAM_STR);
            $res->bindParam(':sername',$sername, PDO::PARAM_STR);
        	$res->execute();
		
			if(!$res){
				echo "Error!";
			}
			else{
				echo"Author Insert!";
			}
			 //header('Location:index.php?page=author&action=allauthor');
		
		
		
		
		//$res->execute(array(':idauthor'=>$idauthor,':name'=>$name,':sername'=>$sername));
		
	}
	
	
	public  function actionAllAuthor(){
   		echo "</br><h2>All Author<h2>";
		$sql = $this->db->query("SELECT idauthor,name,sername From author");
	  
		while($res = $sql->fetch(PDO::FETCH_OBJ)){
		 // echo '<pre>';
		 // print_r($res);
		  // echo '</pre>';
		 
		 echo "<table name ='displayTable' border = '1' cellspacing ='5' width ='50%'>";
			    echo "<tr>
				    	<th>Idauthor</th>
				    	<th>Name</th>
				    	<th>Sername</th>
				    	<th>Update/Delete</th
			    	</tr>";
			    echo "<tr>";
			    
		 echo "<td >".$res->idauthor."</td>
			   <td>".$res->name."</td>
			   <td>".$res->sername."</td>
			   <td><a href ='index.php?page=author&action=editauthor&id=".$res->idauthor."'>Upadate/Delete</a>
			   </td>
			  ";
		}
	 }
  
  
  	public function actionEditAuthor(){
  		
  		
  		
  		$sql = $this->db->query("SELECT idauthor,name,sername From author WHERE idauthor='".$_GET['id']."' ");
                
        while($res = $sql->fetch(PDO::FETCH_ASSOC)){
        	$idauthor=$res['idauthor'];
		    $name = $res['name'];
		    $sername = $res['sername'];
		    
		    echo "<h2>Records for ".$name=$res['name'].' '.$sername = $res['sername'];
		    
		    echo"
		    	
		    	<h2>Update Author</h2>
		    	
		    	<form name='updeteForm' method ='POST' action='index.php?page=author&action=updateauthor&id=".$idauthor."' >
		    	<lable for='idauthor'>idAuthor:</lable>
		    		<input type='text' name='idauthor' value='".$idauthor."'></br>
		    	<label for='name'>NameAuthor:</label>
		    		<input type=text name='name' value='".$name."'></br>
		    	<label for='sername'>SernameAurthor</label>
		    		<input type='text' name='sername' value='".$sername."'></br>
		    	<button type='submit' value='Submit' name='Update'>Update for Records</button>
		    	</form>
		    	
		    	<h2>Delete Author</h2>
		    	
		    	<form name='deleteForm' method ='POST' action='index.php?page=author&action=deleteauthor&id=".$idauthor."' >
		    	<lable for='idauthor'>idAuthor:</lable>
		    		<input type='text' name='idauthor' value='".$idauthor."'></br>
		    	<label for='name'>NameAuthor:</label>
		    		<input type=text name='name' value='".$name."'></br>
		    	<label for='sername'>SernameAurthor</label>
		    		<input type='text' name='sername' value='".$sername."'></br>
		    	<button type='submit' value='Submit' name='Update'>Delete for Records</button>
		    	</form>
		    ";
		}       
  	}
  	
  	
  	public function actionUpdateAuthor(){
  		
  		if(isset($_POST['idauthor']) & !empty($_POST['idauthor'])){
					$idauthor = $_POST['idauthor'];
			}
		if(isset($_POST['name']) & !empty($_POST['name'])){
			$name = $_POST['name'];
		}
		if(isset($_POST['sername']) & !empty($_POST['sername'])){
			$sername = $_POST['sername'];
		}
		
  		$sql =("UPDATE author SET idauthor = :idauthor,name = :name, sername= :sername WHERE idauthor = :idauthor");
  		$res = $this->db->prepare($sql);
  		
  		$res->bindParam(':idauthor',$idauthor,PDO::PARAM_INT);
  		$res->bindParam(':name',$name,PDO::PARAM_STR);
  		$res->bindParam(':sername',$sername,PDO::PARAM_STR);
  		
  		$res->execute();
  	}
  	
  	
  	
	public function actionDeleteAuthor(){
	
		if(isset($_POST['idauthor']) & !empty($_POST['idauthor'])){
					$idauthor = $_POST['idauthor'];
			}
		
		
		$sql =("DELETE FROM author  WHERE idauthor = :idauthor");
		$res = $this->db->prepare($sql);
		
		$res->bindParam(':idauthor',$idauthor,PDO::PARAM_INT);
		$res->execute();
		
		if(!$res){
			echo "Error!";
		}
		else{
			echo"Author Delete!";
		}
		//header('Location:index.php?page=author&action=allauthor');
 
	}
	
	  
}



 
 
 
 
 


