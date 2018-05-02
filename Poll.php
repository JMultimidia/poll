<?php
require_once 'Dao.php';
 
class Poll{
      
    public function addVote($subjectOption)
    {
       $daoObject = new Dao();
       $sql = "INSERT INTO tbl_subject_vote (subject_id) VALUES ('".$subjectOption."')";
       $daoObject->insert($sql); 

    }
    
    public function getCource()
    {
        $daoObject = new Dao();
        $sql = "SELECT * FROM tbl_course order by id";
        $result = $daoObject->select($sql);
        return $result;
    }
    
    
    
    public function getCourcewithVote()
    {
        $daoObject = new Dao();
        $sql = "SELECT * FROM tbl_course order by id";
        $result = $daoObject->select($sql);
        if(!empty($result)) {
            foreach ($result as $k => $v) {
                $result[$k]["vote_count"] = 0;
                $sql_stmt = "SELECT COUNT(course_id) as vote_count FROM tbl_course_vote WHERE course_id = ". $result[$k]["id"];
                $voteResult = $daoObject->select($sql_stmt);
                if(!empty($voteResult[0]["vote_count"])) {
                    $result[$k]["vote_count"] = $voteResult[0]["vote_count"];
                }
            }
        }
        
        return $result;
    }
}

?>