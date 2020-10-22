<?php
require_once 'DB.php';
## This class is custom implementation of $_sessions and extension of SessionHandler class
class Session {
    // session-lifetime
    public $lifeTime;
	
    // mysql-handle
    public $dbHandle;
	
	function __construct(){
		// get session-lifetime
		$this->lifeTime = get_cfg_var("session.gc_maxlifetime");
	    // open database-connection
		$this->dbHandle = DB::getInstance();
		return true;
	}
	
    function open($savePath, $sessName) {
		return true;
    }
	
    function close() {
        $this->gc(ini_get('session.gc_maxlifetime'));
        // close database-connection
		$this->dbHandle = null;
        return true;
    }
	
    function read($sessID) {
        // fetch session-data
		$query = $this->dbHandle->prepare("SELECT session_data AS d FROM `ws_sessions` 
											WHERE session_id = ? 
											AND session_expires > ?");
		$query->bindParam(1, $sessID, PDO::PARAM_STR);
		$time = time()+0; // adding 0 to string makes it integer
		$query->bindParam(2, $time, PDO::PARAM_INT);
		$query->execute();
		if($row = $query->fetch(PDO::FETCH_ASSOC))
			return $row['d'];
		return "";
    }
	
    function write($sessID,$sessData) {
        // new session-expire-time
        $newExp = time() + $this->lifeTime;
        // is a session with this id in the database?
		$query = $this->dbHandle->prepare("SELECT * FROM `ws_sessions`
											WHERE session_id = ?");
		$query->bindParam(1, $sessID, PDO::PARAM_STR);
		$query->execute();
        // if yes,
        if($query->rowCount() > 0) {
            // ...update session-data
            $query2 = $this->dbHandle->prepare("UPDATE `ws_sessions`
                         SET session_expires = ?,
                         session_data = ?
                         WHERE session_id = ?");
			$query2->bindParam(1, $newExp, PDO::PARAM_INT);
			$query2->bindParam(2, $sessData, PDO::PARAM_STR);
			$query2->bindParam(3, $sessID, PDO::PARAM_STR);		
			$query2->execute();
            // if something happened, return true
            if($query2->rowCount() > 0)
                return true;
        }
        // if no session-data was found,
        else {
            // create a new row
            $query3 = $this->dbHandle->prepare("INSERT INTO `ws_sessions` (
                         session_id,
                         session_expires,
                         session_data)
                         VALUES(?,?,?)");
			$query3->bindParam(1, $sessID, PDO::PARAM_STR);
			$query3->bindParam(2, $newExp, PDO::PARAM_INT);
			$query3->bindParam(3, $sessData, PDO::PARAM_STR);		
			$query3->execute();
            // if row was created, return true
            if($query3->rowCount() > 0)
                return true;
        }
        // an unknown error occured
        return false;
    }
	
    function destroy($sessID) {
        // delete session-data 
        $query = $this->dbHandle->prepare("DELETE FROM `ws_sessions` WHERE session_id = ?");
		$query->bindParam(1, $sessID, PDO::PARAM_STR);
		$query->execute();
        // if session was deleted, return true,
        if($query->rowCount()>0)
            return true;
        // ...else return false
        return false;
    }
	
    function gc($sessMaxLifeTime) {
        // delete old sessions
        $query = $this->dbHandle->prepare("DELETE FROM `ws_sessions` WHERE session_expires < ?");
		$time = time()+0;
		$query->bindParam(1, $time, PDO::PARAM_INT);
		$query->execute();
        // return affected rows
        return $query->rowCount();
    }
}

$session = new Session();
session_set_save_handler(array(&$session,"open"),
                         array(&$session,"close"),
                         array(&$session,"read"),
                         array(&$session,"write"),
                         array(&$session,"destroy"),
                         array(&$session,"gc"));


session_start();
?>
<h2>
<?php 

//echo $_SESSION['name'];
echo time();
?></h2>

